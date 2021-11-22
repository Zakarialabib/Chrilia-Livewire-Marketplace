<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::where('active', '=', 1)->get();

        return view('frontend.pages', compact('pages'));

    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)
                      ->where('active', '=', 1)->first();

        return view('frontend.single-page', compact('page'));

    }
}