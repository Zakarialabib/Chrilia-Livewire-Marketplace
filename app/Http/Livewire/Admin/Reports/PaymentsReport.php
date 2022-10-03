<?php

namespace App\Http\Livewire\Admin\Reports;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\OrderPayment;

class PaymentsReport extends Component
{

    use WithPagination;

    public $start_date;
    public $end_date;
    public $payments;
    public $payment_method;

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date',
        'payments'   => 'required|string'
    ];
    protected $query;

    public function mount() {
        $this->start_date = today()->subDays(30)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
        $this->payments = '';
        $this->query = null;
    }

    public function render() {
        $this->getQuery();

        return view('livewire.admin.reports.payments-report', [
            'information' => $this->query ? $this->query->orderBy('date', 'desc')
                ->when($this->start_date, function ($query) {
                    return $query->whereDate('date', '>=', $this->start_date);
                })
                ->when($this->end_date, function ($query) {
                    return $query->whereDate('date', '<=', $this->end_date);
                })
                ->when($this->payment_method, function ($query) {
                    return $query->where('payment_method', $this->payment_method);
                })
                ->paginate(10) : collect()
        ]);
    }

    public function generateReport() {
        $this->validate();
        $this->render();
    }

    public function updatedPayments($value) {
        $this->resetPage();
    }

    public function getQuery() {
        if ($this->payments == 'sale') {
            $this->query = orderPayment::query()->with('sale');
        } else {
            $this->query = null;
        }
    }
}
