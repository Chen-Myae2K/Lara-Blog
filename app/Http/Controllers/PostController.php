<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Photo;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::search()
            ->when(Auth::user()->role === 'author', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest('id')
            ->when(request('trash'), fn($q) => $q->onlyTrashed())
            ->paginate(10)
            ->withQueryString();

        return view('post.index', compact('posts'));
        // return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $links = ["post" => route('post.index'), "create" => route('post.create')];
        return view('post.create', compact('links'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        try {

            DB::beginTransaction();
            $post = new Post();
            $post->title = $request->title;
            $post->slug = Str::slug($request->title);
            $post->description = $request->description;
            $post->excerpt = Str::words($request->description, 40, ' ...');
            $post->user_id = Auth::id();
            $post->category_id = $request->category;
            if ($request->hasFile('featured_image')) {
                $newName = uniqid() . "_featured_image." . $request->file('featured_image')->getClientOriginalExtension();
                $request->file('featured_image')->storeAs('public', $newName);
                $post->featured_image = $newName;
            }
            $post->save();

            foreach ($request->photos as $key => $photo) {

                //1. save to storage
                $newName = uniqid() . "_post_photo." . $photo->getClientOriginalExtension();
                $photo->storeAs('public', $newName);
                $savedPhotos[$key] = [
                    "post_id" => $post->id,
                    "name" => $newName,
                ];
            };

            Photo::insert($savedPhotos);


            DB::commit();

            //2. save to db
            // $photo = new Photo();
            // $photo->post_id = $post->id;
            // $photo->name = $newName;
            // $photo->save();
        } catch (Exception $e) {

            DB::rollBack();
        }
        return redirect()->route('post.index')->with('status', $post->title . ' created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('view', $post);
        dd($post);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $links = ["post" => route('post.index'), "edit" => route('post.edit', $post)];
        Gate::authorize('update', $post);
        return view('post.edit', compact('post', 'links'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        if (Gate::denies('update', $post)) {
            return abort(403, 'You are not authorized');
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->excerpt = Str::words($request->description, 40, ' ...');
        $post->user_id = Auth::id();
        $post->category_id = $request->category;

        if ($request->hasFile('featured_image')) {
            $newName = uniqid() . "_featured_image." . $request->file('featured_image')->getClientOriginalExtension();
            Storage::delete('public/' . $post->featured_image); // Delete old image if exists)
            $request->file('featured_image')->storeAs('public', $newName);
            $post->featured_image = $newName;
        }

        $post->update();
        if ($request->photos) {
            foreach ($request->photos as $photo) {
                $newName = uniqid() . "_post_photo." . $photo->getClientOriginalExtension();
                $photo->storeAs('public', $newName);

                $photo = new Photo();
                $photo->name = $newName;
                $photo->post_id = $post->id;
                $photo->save();
            }
        }
        return redirect()->route('post.index')->with('status', $post->title . ' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        if (request('delete') == "force"):

            if (Gate::denies('delete', $post)) {
                return abort(403, 'You are not authorized');
            }
            // dd($post->photos->pluck('id'));

            if ($post->featured_image) {
                Storage::delete('public/' . $post->featured_image); // Delete the image from storage
            }

            // foreach ($post->photos as $photo) {
            //     //remove from storage
            //     Storage::delete('public/' . $photo->name);
            //     //delete from table
            //     // $photo->delete();
            // }

            Storage::delete($post->photos->map(fn($photo) => "public/" . $photo->name)->toArray());
            // Photo::destroy($post->photos->pluck('id')); //ဒါကကျ collection ထည့်‌ေပးလိုက်လည်းရ
            Photo::where('post_id', $post->id)->delete();
            // $post->delete();
            Post::withTrashed()->findOrFail($id)->forceDelete();
            $message = ['status' => $post->title . ' deleted successfully!'];
        elseif (request('delete') == "restore"):
            Post::withTrashed()->findOrFail($id)->restore();
            $message = ['status' => $post->title . ' restored successfully!'];
        else:
            Post::withTrashed()->findOrFail($id)->delete();
            $message = ['status' => $post->title . ' trashed successfully!'];
        endif;
        return redirect()->route('post.index')->with($message);
    }
}
