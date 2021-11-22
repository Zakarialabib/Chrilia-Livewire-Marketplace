<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', 1)->get();

        return view('frontend.blog', compact('posts'));

    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                      ->where('status', '=', 1)->first();

        return view('frontend.single-post', compact('post'));

    }
}