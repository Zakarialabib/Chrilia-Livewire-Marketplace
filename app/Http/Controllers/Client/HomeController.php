<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }
    public function user(){

        $user = User::find(Auth::user()->id);

        return view('client.user.index', compact('user'));
    }
    public function order(){

        $order = Order::find(Auth::user()->id);

        return view('client.order.index', compact('order'));

    }
}
