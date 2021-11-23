<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VendorController extends Controller
{
    public function show($company_name)
    {
        $page = User::where('company_name', $company_name)
                      ->where('status', '=', 1)->first();

        return view('frontend.vendor-page', compact('page'));

    }
}