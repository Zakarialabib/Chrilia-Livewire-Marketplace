<?php

namespace App\Http\Controllers\Admin;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\{    
    User,
    Category,
    Product,
    Order,
    OrderDetails,
    OrderPayment
};
use Modules\Order\Http\Requests\StorePosOrderRequest;

class PosController extends Controller
{

    public function index() {
        Cart::instance('order')->destroy();

        $customers = User::all();
        $product_categories = Category::all();

        return view('admin.order.pos.index', compact('product_categories', 'customers'));
    }


    public function store(StorePosOrderRequest $request) {
        DB::transaction(function () use ($request) {
            $due_amount = $request->total_amount - $request->paid_amount;

            if ($due_amount == $request->total_amount) {
                $payment_status = 'Unpaid';
            } elseif ($due_amount > 0) {
                $payment_status = 'Partial';
            } else {
                $payment_status = 'Paid';
            }

            $order = Order::create([
                'created_at' => now()->format('Y-m-d'),
                'code' => 'PSL',
                'client_id' => $request->client_id,
                'customer_name' => User::findOrFail($request->client_id)->customer_name,
                'shipping_amount' => $request->shipping_amount * 100,
                'paid_amount' => $request->paid_amount * 100,
                'total_amount' => $request->total_amount * 100,
                'due_amount' => $due_amount * 100,
                'status' => 'Completed',
                'payment_status' => $payment_status,
                'payment_method' => $request->payment_method,
                'note' => $request->note,
            ]);

            foreach (Cart::instance('order')->content() as $cart_item) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $cart_item->id,
                    'product_name' => $cart_item->name,
                    'product_code' => $cart_item->options->code,
                    'quantity' => $cart_item->qty,
                    'price' => $cart_item->price * 100,
                    'unit_price' => $cart_item->options->unit_price * 100,
                    'sub_total' => $cart_item->options->sub_total * 100,
                ]);

                $product = Product::findOrFail($cart_item->id);
                $product->update([
                    'product_quantity' => $product->product_quantity - $cart_item->qty
                ]);
            }

            Cart::instance('order')->destroy();

            if ($order->paid_amount > 0) {
                OrderPayment::create([
                    'date' => now()->format('Y-m-d'),
                    'reference' => 'INV/'.$order->code,
                    'amount' => $order->paid_amount,
                    'order_id' => $order->id,
                    'payment_method' => $request->payment_method
                ]);
            }
        });

        toast('POS Order Created!', 'success');

        return redirect()->route('admin.orders.index');
    }
}
