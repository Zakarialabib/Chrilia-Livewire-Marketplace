<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SectionController extends Controller
{

    public function index(Section $section)
    {
        // abort_if(Gate::denies('post_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section.index',compact('section'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section.create');
    }

    public function edit(Section $section)
    {
        // abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section.edit', compact('section'));
    }

    public function show(Section $section)
    {
        // abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.section.show', compact('section'));
    }

}