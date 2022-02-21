<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact; 
use App\Models\Section; 
use App\Models\Brand; 
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
        
        return view('frontend.brands', ['data' => $data]);
    }

    public function brandDetail($brand_slug)
    {
        $page = 1;
        
        if(request()->has('page'))
            $page = request()->input('page');

        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/brands/$brand_slug?page=$page")->json();

        // $paginator = new LengthAwarePaginator(
        //     // $data->count(), $page
        // );

        return view('frontend.single-brand', compact('data','brand_slug','page'));
    }

    public function phoneDetail($slug)
    {
        $data = Http::get("https://api-mobilespecs.azharimm.site/v2/$slug")->json();        
        
        // dd($data);

        return view('frontend.single-phone', compact('data','slug'));
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