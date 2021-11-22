<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromQuery, WithMapping, WithHeadings
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
            '#',
            'Tracking Code',
            'Status',
            'Client',
            'Vendor',
            'Receiver name',
            'Receiver address',
            'Receiver phone',
            'Product_name',
            'Price',
            'Created At'
        ];
    }

    public function map($order) : array
    {

        return[
        $order->id,
        $order->code,
        $order->status,
        $order->client->name,
        $order->vendor->name,
        $order->receiver_name,
        $order->receiver_address,
        $order->receiver_phone,
        $order->product_name,
        $order->price,
        $order->created_at,
        ];

    }


    public function query()
    {
        return Order::whereIn('id', $this->selected);
    }
}