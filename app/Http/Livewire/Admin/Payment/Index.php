<?php

namespace App\Http\Livewire\Admin\Payment;

use Illuminate\Http\Response;
use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Payment;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\PaymentsExport;
use App\Exports\PaymentsInvoice;
use Maatwebsite\Excel\Facades\Excel;
use Request, PDF, Gate, Auth;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;
    
    public int $perPage;
    
    public $clients , $start_date, $end_date, $client_id;

    public array $orderable;

    public $showDeleteModal = false;

    public string $search = '';
    
    public array $selected = [];

    public array $paginationOptions;

    public array $listsForFields = [];

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    protected $listeners = ['reRenderParent','delete'];

    public function reRenderParent()
    {
        $this->mount();
        $this->render();
    }

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function filterDate() {
        $this->validate();
        $this->render();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['clients'] = Role::find(2)->users->pluck('name','id');
    }

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date'   => 'required|date|after:start_date',
    ];

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Payment())->orderable;
        $this->start_date = today()->subDays(30)->format('Y-m-d');
        $this->end_date = today()->format('Y-m-d');
        $this->client_id = '';
        $this->initListsForFields();
    }

    public function render()
    {
        $query = Payment::whereDate('created_at', '>=', $this->start_date)
                        ->whereDate('created_at', '<=', $this->end_date)
                        ->when($this->client_id, function ($query) {
                            return $query->where('client_id', $this->client_id);
                        })->advancedFilter([
                            's'               => $this->search ?: null,
                            'order_column'    => $this->sortBy,
                            'order_direction' => $this->sortDirection,
                        ]);

        $total_payment = $query->sum('amount_received');
        $total_admin = $query->sum('admin_amount');
        $total_vendor = $query->sum('vendor_amount');
        $total_client = $query->sum('client_amount');

        $payments = $query->paginate($this->perPage);

        return view('livewire.admin.payment.index', compact('payments', 'total_payment', 'total_admin', 'total_vendor', 'total_client'));
    }

      /**
     * -------------------------------------------------------------------------------
     *  Export Payment Data
     * -------------------------------------------------------------------------------
    **/

    public function export()
    {
        return(new PaymentsExport($this->selected))->download('paymentsInvoice.xls');
    }
    public function exportInvoice()
    {
        $payments = Payment::whereIn('id', $this->selected);
        
        $pdfContent = PDF::loadView('print.payment_invoice',['payments' => $payments])->output();
        return response()->streamDownload(
             fn () => print($pdfContent),
             "payment_invoice.pdf"
        );
    
        // $pdf = PDF::loadView('print.payment_invoice', compact('payments'));
    
        //  return $pdf->download('paymentsInvoice.pdf');

        //  $view = View('print.payment_invoice', ['payments' => $payments]);
        //     $pdf = \App::make('dompdf.wrapper');
        //     $pdf->loadHTML($view->render());
        //     return $pdf->stream();
    }

    // public function exportInvoice()
    // {
    //     return(new PaymentsInvoice($this->selected))->download('paymentsInvoice.pdf');
    // }

      /**
     * -------------------------------------------------------------------------------
     *  Delete Payment
     * -------------------------------------------------------------------------------
    **/

    public function deleteSelected()
    {
        abort_if(Gate::denies('admin_payment_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Payment::whereIn('id', $this->selected)->delete();

        $this->showDeleteModal = false;

        $this->resetSelected();

        $this->reRenderParent();
    }

    public function delete(Payment $payment)
    {
        abort_if(Gate::denies('admin_payment_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        $this->alert('warning', __('Payment deleted successfully!') );

        $this->reRenderParent();
    }
}
