<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use Illuminate\Http\Request;
use App\Models\Phone;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Http;

class PhoneController extends Controller
{

    public function index()
    {
        // abort_if(Gate::denies('admin_phone_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.phone.index');
    }
    public function brandDetail($brand_slug)
    {
        // abort_if(Gate::denies('admin_brand_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // dd($data['data']);
            $data = Http::get("https://api-mobilespecs.azharimm.site/v2/brands/$brand_slug")->json();

            foreach ($data['data']['phones'] as $item){
                $brand = $item['brand'];
                $phone_name = $item['phone_name'];
                $slug = $item['slug'];
                $image = $item['image'];
                
                $phone = Phone::create([
                    'brand' => $brand ,
                    'phone_name'=> $phone_name,
                    'slug' => $slug ,
                    'image' => $image ,
                ], $data); 
                $phone->save();
            }

            $phones = Phone::all();


        return view('admin.phone.show',compact('data','phone','phones'));
    }

    public function create()
    {
      //  abort_if(Gate::denies('admin_phone_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phone.create');
    }

    public function edit(Phone $phone)
    {
        // abort_if(Gate::denies('admin_phone_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phone.edit', compact('phone'));
    }

    public function show(Phone $phone)
    {
        // abort_if(Gate::denies('admin_phone_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phone.show', compact('phone'));
    }

}