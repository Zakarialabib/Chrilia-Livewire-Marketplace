<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function index() {
        // abort_if(Gate::denies('admin_reports'), 403);

        return view('admin.reports.index');
    }
    public function profitLossReport() {
        // abort_if(Gate::denies('admin_reports'), 403);

        return view('admin.reports.profit-loss.index');
    }

    public function paymentsReport() {
        // abort_if(Gate::denies('admin_reports'), 403);

        return view('admin.reports.payments.index');
    }

    public function salesReport() {
        // abort_if(Gate::denies('admin_reports'), 403);

        return view('admin.reports.admin.orders.index');
    }

    public function purchasesReport() {
        // abort_if(Gate::denies('admin_reports'), 403);

        return view('admin.reports.purchases.index');
    }

}
