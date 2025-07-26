<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostApiController extends Controller
{
    public function index()
    {

        $posts = Post::search()
            ->paginate(10)
            ->withQueryString();
        // return response($posts);
        return response()->json($posts); //json နဲ့ ပြန်တာ json response
        //response နဲ့ ပြန်ပါမယ် json နဲ့ ပြန်ပါမယ်
    }

    public function detail($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'user', 'photos'])->first();

        return response()->json($post);
    }
}
