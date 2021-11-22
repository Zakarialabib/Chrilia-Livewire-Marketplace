<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Config,Auth;

class PaymentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_payment_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment.index');
    }

    public function create(Payment $payment, User $client, Order $order)
    {
        abort_if(Gate::denies('admin_payment_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.payment.create');
    }

    public function edit(Payment $payment)
    {

    abort_if(Gate::denies('admin_payment_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return view('admin.payment.edit',compact('payment'));

    }

    public function show(Payment $payment)
    {
        return view('admin.payment.show',compact('payment'));
    }

    public function paymentInvoice($id)
    {
        $payment = Payment::find($id);

        $siteImage = Config::get('settings.site_logo');

        $user = User::find(Auth::user()->id);

        return view('print.payment_invoice', compact('payment','siteImage','user'));
    }
}
