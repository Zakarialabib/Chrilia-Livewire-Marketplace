<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Models\Order;
use App\Models\OrderPayment;

class OrderPaymentsController extends Controller
{

    public function index($order_id) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $order = Order::findOrFail($order_id);

        return view('admin.payments.index', compact('order'));
    }


    public function create($order_id) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $order = Order::findOrFail($order_id);

        return view('admin.payments.create', compact('order'));
    }


    public function store(Request $request) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
            'order_id' => 'required',
            'payment_method' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request) {
            OrderPayment::create([
                'date' => $request->date,
                'reference' => $request->reference,
                'amount' => $request->amount,
                'note' => $request->note,
                'order_id' => $request->order_id,
                'payment_method' => $request->payment_method
            ]);

            $order = Order::findOrFail($request->order_id);

            $due_amount = $order->due_amount - $request->amount;

            if ($due_amount == $order->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $order->update([
                'paid_amount' => ($order->paid_amount + $request->amount) * 100,
                'due_amount' => $due_amount * 100,
                'payment_status' => $payment_status
            ]);
        });

        toast('Order Payment Created!', 'success');

        return redirect()->route('admin.orders.index');
    }


    public function edit($order_id, OrderPayment $orderPayment) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $order = Order::findOrFail($order_id);

        return view('admin.payments.edit', compact('orderPayment', 'order'));
    }


    public function update(Request $request, OrderPayment $orderPayment) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $request->validate([
            'date' => 'required|date',
            'reference' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'note' => 'nullable|string|max:1000',
            'order_id' => 'required',
            'payment_method' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request, $orderPayment) {
            $order = $orderPayment->order;

            $due_amount = ($order->due_amount + $orderPayment->amount) - $request->amount;

            if ($due_amount == $order->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $order->update([
                'paid_amount' => (($order->paid_amount - $orderPayment->amount) + $request->amount) * 100,
                'due_amount' => $due_amount * 100,
                'payment_status' => $payment_status
            ]);

            $orderPayment->update([
                'date' => $request->date,
                'reference' => $request->reference,
                'amount' => $request->amount,
                'note' => $request->note,
                'order_id' => $request->order_id,
                'payment_method' => $request->payment_method
            ]);
        });

        toast('Order Payment Updated!', 'info');

        return redirect()->route('admin.orders.index');
    }


    public function destroy(OrderPayment $orderPayment) {
        // abort_if(Gate::denies('access_order_payments'), 403);

        $orderPayment->delete();

        toast('Order Payment Deleted!', 'warning');

        return redirect()->route('admin.orders.index');
    }
}
