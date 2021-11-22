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

        $data = array(
            'today' => array(
                'orders' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now())->count(),
                'orderTotal' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now())->sum('total'),
                'STATUS_PENDING' => Auth::user()->orders()->where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_PROCESSING' => Auth::user()->orders()->where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_COLLECTING' => Auth::user()->orders()->where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_CONFIRMED' => Auth::user()->orders()->where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_SHIPPING' => Auth::user()->orders()->where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_CANCELED' => Auth::user()->orders()->where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_COMPLETED' => Auth::user()->orders()->where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_RETURNED' => Auth::user()->orders()->where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now())->count(),
                'STATUS_PAID' => Auth::user()->orders()->where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now())->count(),
            ),
            'month' => array(
                'orders' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'orderTotal' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now()->subMonth())->sum('total'),
                'STATUS_PENDING' => Auth::user()->orders()->where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_PROCESSING' => Auth::user()->orders()->where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_COLLECTING' => Auth::user()->orders()->where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_CONFIRMED' => Auth::user()->orders()->where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_SHIPPING' => Auth::user()->orders()->where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_CANCELED' => Auth::user()->orders()->where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_COMPLETED' => Auth::user()->orders()->where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_RETURNED' => Auth::user()->orders()->where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
                'STATUS_PAID' => Auth::user()->orders()->where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subMonth())->count(),
            ),
            'semi' => array(
                'orders' => Auth::user()->orders()->where( 'created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'orderTotal' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->sum('total'),
                'STATUS_PENDING' => Auth::user()->orders()->where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_PROCESSING' => Auth::user()->orders()->where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_COLLECTING' => Auth::user()->orders()->where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_CONFIRMED' => Auth::user()->orders()->where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_SHIPPING' => Auth::user()->orders()->where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_CANCELED' => Auth::user()->orders()->where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_COMPLETED' => Auth::user()->orders()->where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_RETURNED' => Auth::user()->orders()->where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
                'STATUS_PAID' => Auth::user()->orders()->where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subMonths(6))->count(),
            ),
            'year' => array(
                'orders' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'orderTotal' => Auth::user()->orders()->whereDate('created_at', '>=' , Carbon::now()->subYear())->sum('total'),
                'STATUS_PENDING' => Auth::user()->orders()->where('status', '=' , 0)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_PROCESSING' => Auth::user()->orders()->where('status', '=' , 1)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_COLLECTING' => Auth::user()->orders()->where('status', '=' , 2)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_CONFIRMED' => Auth::user()->orders()->where('status', '=' , 3)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_SHIPPING' => Auth::user()->orders()->where('status', '=' , 4)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_CANCELED' => Auth::user()->orders()->where('status', '=' , 5)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_COMPLETED' => Auth::user()->orders()->where('status', '=' , 6)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_RETURNED' => Auth::user()->orders()->where('status', '=' , 7)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
                'STATUS_PAID' => Auth::user()->orders()->where('status', '=' , 8)->whereDate('created_at', '>=' , Carbon::now()->subYear())->count(),
            ),
        );

        return view('vendor.home', compact('data'));
    }
}