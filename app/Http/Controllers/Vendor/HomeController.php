<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Order;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $products_data = Auth::user()->products()->count();             

        return view('vendor.home', compact('products_data'));
    }
}