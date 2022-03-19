<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{

    public function index(Brand $brand)
    {
        // abort_if(Gate::denies('route_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $brands = Brand::all();
        
        return view('admin.brand.index',compact('brands'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brand.create');
    }

    public function edit(Brand $brand)
    {
        // abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brand.edit', compact('brand'));
    }

    public function show(Brand $brand)
    {
        // abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.brand.show', compact('brand'));
    }

}