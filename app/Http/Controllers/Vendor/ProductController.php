<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Http;

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

    public function productSync()
    {
        
        $apiUrl = '127.0.0.1:8000/api/v1/';
        $apiKey = '1otDa9wrzJZNywwbFNLaGgb7TZi9gbBV8JfMOLhRtf9hpzQAkYDH6XJXMBxL';

        $data = Http::withBasicAuth('omar@taibalharamain.ma', 'password')->get( $apiUrl ."products" . $apiKey);
        
        // 
        dd($data);
        
        // foreach ($data['data']['phones'] as $item){
        //     $brand = $item['brand'];
        //     $phone_name = $item['phone_name'];
        //     $slug = $item['slug'];
        //     $image = $item['image'];
            
        //     $phone = Phone::create([
        //         'brand' => $brand ,
        //         'phone_name'=> $phone_name,
        //         'slug' => $slug ,
        //         'image' => $image ,
        //         ], $data); 
        //     $phone->save();
        // }
            
        return view('vendor.product.product-import', $data);
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
