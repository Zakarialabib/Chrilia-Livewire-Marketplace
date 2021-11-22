<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class OrderController extends Controller
{
    public function index()
    {
        //abort_if(Gate::denies('client_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.order.index');
    }

    public function create()
    {
        //abort_if(Gate::denies('client_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.order.create');
    }

    public function edit(Order $order)
    {
        //abort_if(Gate::denies('client_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.order.edit',compact('order')); 
    }

    public function show(Order $order)
    {
        //abort_if(Gate::denies('client_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('vendor.order.show',compact('order'));
    }

    public function orderInvoice($id)
    {
        $order = Order::find($id);

        $siteImage = Config::get('settings.site_logo');

        $user = User::find(Auth::user()->id);

        return view('print.order_invoice', compact('order','siteImage','user'));
    }
}
