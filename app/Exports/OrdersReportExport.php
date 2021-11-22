<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersReportExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selected;

    public function __construct($selected)
    { 
        $this->selected = $selected;
    }
    /**
    * @var Order $order
    */
 
    public function headings(): array
    {
        return [
            'Order Code',
            'Client name',
            'Order Status',
            'Payment Status',
            'Amount',
            'Created At'
        ];
    }

    public function map($order) : array
    {

        return[
        $order->code,
        $order->client->name,
        $order->status,
        $order->payment_status ? __('Paid') : __('Inpaid'),
        $order->price,
        $order->created_at,
        ];

    }


    public function query()
    {
        return Order::whereIn('id', $this->selected);
    }
}