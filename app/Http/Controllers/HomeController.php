<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact; 
use App\Models\Section; 
use App\Models\Brand; 
use App\Models\Phone; 
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
   
    public function index()
    {
        $setting = Setting::all();
        return view('frontend.home', compact('setting'));
    }

    public function brands()
    {
        $data = Http::get('https://api-mobilespecs.azharimm.site/v2/brands')->json();
        $brands = Brand::all();
        foreach ($data['data'] as $item){
            $brand_name = $item['brand_name'];
            $device_count = $item['device_count'];
            $brand_slug = $item['brand_slug'];
        }

        $brand = Brand::create([
            'name' => $brand_name,
            'brand_slug' => $brand_slug,
            'device_count'=> $device_count,
            ], $data); 
        $brand->save();


        return view('frontend.brands', [
        'data' => $data,
        'brands' => $brands,                                
        'brand' => $brand
         ]);
    
}

    public function brandDetail($brand_slug)
    {

        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/brands/$brand_slug?page=1")->json();
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
        return view('frontend.single-brand'
        , compact('data','brand_slug'));
    }

    public function phoneDetail($slug)
    {
        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/$slug")->json();        
        
        // dd($data);
        $phone = Phone::where('slug', $slug)->first();

        return view('frontend.single-phone', compact('data','slug','phone'));
    }

    public function phoneSearch($query)
    {
        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/search?query=$query")->json();        
        
        // dd($data);

        return view('frontend.search-phone', compact('data','query'));
    }


    public function products()
    {
        return view('frontend.products');
    }

    public function terms()
    {
        return view('auth.terms');
    }
    public function approval()
    {
        return view('auth.approval');
    }


}