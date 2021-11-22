<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selected;
    
    public function __construct($selected)
    { 
        $this->selected = $selected;
    }
       /**
    * @var Payment $payment
    */
 
    public function headings(): array
    {
        return [
            '#',
            'Code',
            'Status',
            'Method',
            'Order Code',
            'Client Name',
            'Admin Amount',
            'Client Amount',
            'Vendor Amount',
            'Amount Paid',
            'Created At'
        ];
    }

    public function map($payment) : array
    {
        return[
        $payment->id,
        $payment->code,
        $payment->status,
        $payment->method ? __('Bank Transfer') : __('Cash'),
        $payment->order->code,
        $payment->client->name,
        $payment->admin_amount,
        $payment->vendor_amount,
        $payment->client_amount,
        $payment->amount_received,
        $payment->created_at,
        ];

    }

    public function query()
    {
        return Payment::whereIn('id', $this->selected);
    }

}