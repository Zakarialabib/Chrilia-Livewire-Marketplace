<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use App\Models\Comment;
use App\Models\User;
use Auth, Config;
class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order.index');
    }

    public function create()
    {
        abort_if(Gate::denies('admin_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.order.create');
    }

    public function edit(Order $order)
    {
    abort_if(Gate::denies('admin_order_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return view('admin.order.edit',compact('order'));

    }

    public function show(Order $order)
    {
        $comments = Comment::query()->get();
        return view('admin.order.show',compact('order','comments'));
    }

    public function orderInvoice($id)
    {
        $order = Order::find($id);

        $siteImage = Config::get('settings.site_logo');

        $user = User::find(Auth::user()->id);

        return view('print.order_invoice', compact('order','siteImage','user'));
    }
}
