<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{

    public function index(Post $post)
    {
        // abort_if(Gate::denies('post_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post.index',compact('post'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post.create');
    }

    public function edit(Post $post)
    {
        // abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post.edit', compact('post'));
    }

    public function show(Post $post)
    {
        // abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.post.show', compact('post'));
    }

}