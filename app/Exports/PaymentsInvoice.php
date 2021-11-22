<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaymentsInvoice implements FromQuery, WithMapping, WithHeadings
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
            'Code',
            'Order Code',
            'Client Name',
            'Client Amount',
            'Amount Paid',
            'Created At'
        ];
    }

    public function map($payment) : array
    {
        return[
        $payment->code,
        $payment->order->code,
        $payment->client->name,
        $payment->client_amount,
        $payment->amount_received,
        $payment->created_at,
        ];

    }

    public function query()
    {
        return Payment::whereIn('id', $this->selected);
    }

    public function view(): View
    {
        return view('print.payment_invoice', [
            'payments' => Payment::whereIn('id', $this->selected)
        ]);
    }
}