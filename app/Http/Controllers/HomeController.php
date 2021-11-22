<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact; 
use App\Models\Section; 

class HomeController extends Controller
{
   
    public function index()
    {
        $setting = Setting::all();
        return view('frontend.home', compact('setting'));
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