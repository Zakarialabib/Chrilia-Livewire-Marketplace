<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.product.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.product.create');
    }

    public function edit(Product $product)
    {
        //abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.product.edit',compact('product')); 
    }

    public function show(Product $product)
    {
        //abort_if(Gate::denies('client_product_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.product.show',compact('product'));

    }

     /**
    * @return \Illuminate\Support\Collection
    */
    public function productImport(Request $request) 
    {
        $request->validate([
            'excel' => 'required',
        ]);

        Excel::import(new ProductsImport, request()->file('excel'));

        return back();
    }

}
