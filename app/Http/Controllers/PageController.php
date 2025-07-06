<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->orWhere('title', 'like', "%$keyword%")
                ->orWhere('description', 'like', "%$keyword%");
        })
            ->latest()
            ->with('category', 'user')
            ->paginate(10)
            ->withQueryString();

        // return $posts;
        return view('index', compact('posts'));
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'user', 'photos'])->first();

        return view('detail', compact('post'));
    }

    // public function postByCategory($slug)
    // {
    //     $category = Category::where('slug', $slug)
    //                 ->with('posts', 'user')
    //                 ->paginate(10)
    //                 ->withQueryString();

    //     return view('index', compact('category'));
    // }

    public function postByCategory($slug)
    {
        $category = Category::where("slug", $slug)->first();

        //    return $category;
        //    $category = Category::where("slug",$slug)->first();

        $posts = Post::where(function ($q) {
            $q->when(request('keyword'), function ($q) {
                $keyword = request('keyword');
                $q->orWhere("title", "like", "%$keyword%")
                    ->orWhere("description", "like", "%$keyword%");
            });
        })
            ->where("category_id", $category->id)
            ->latest("id")
            ->with(['user', 'category'])
            ->paginate(10)
            ->withQueryString();

        return view('index', compact('posts', 'category'));
    }
}
