<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderPayment;

class ProfitLossReport extends Component
{

    public $start_date;
    public $end_date;
    public $total_orders, $orders_amount;
    public $profit_amount;
    public $payments_received_amount;
    public $payments_sent_amount;
    public $payments_net_amount;

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date'
    ];

    public function mount() {
        $this->start_date = '';
        $this->end_date = '';
        $this->total_orders = 0;
        $this->orders_amount = 0;
        $this->payments_received_amount = 0;
        $this->payments_sent_amount = 0;
        $this->payments_net_amount = 0;
    }

    public function render() {
        $this->setValues();

        return view('livewire.admin.reports.profit-loss-report');
    }

    public function generateReport() {
        $this->validate();
    }

    public function setValues() {
        $this->total_orders = Order::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->count();

        $this->orders_amount = Order::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('total_amount') / 100;

        $this->profit_amount = $this->calculateProfit();

        $this->payments_received_amount = $this->calculatePaymentsReceived();

        $this->payments_sent_amount = $this->calculatePaymentsSent();

        $this->payments_net_amount = $this->payments_received_amount - $this->payments_sent_amount;
    }

    public function calculateProfit() {
        $product_costs = 0;
        $revenue = $this->orders_amount - $this->order_returns_amount;
        $orders = Order::completed()
            ->when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->with('orderDetails')->get();

        foreach ($orders as $order) {
            foreach ($order->orderDetails as $orderDetail) {
                $product_costs += $orderDetail->product->wholesale_price; 
            }
        }

        $profit = $revenue - $product_costs;

        return $profit;
    }

    public function calculatePaymentsReceived() {
        $order_payments = OrderPayment::when($this->start_date, function ($query) {
                return $query->whereDate('date', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('date', '<=', $this->end_date);
            })
            ->sum('amount') / 100;


        return $order_payments;
    }

   
}
