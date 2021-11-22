<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // abort_if(Gate::denies('admin_page_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.page.index');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('admin_page_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.page.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        // abort_if(Gate::denies('admin_page_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        // abort_if(Gate::denies('admin_page_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.page.edit', compact('page'));
    }

}
