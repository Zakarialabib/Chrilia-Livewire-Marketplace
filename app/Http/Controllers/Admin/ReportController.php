<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function index() {
        // abort_if(Gate::denies('access_reports'), 403);

        return view('admin.reports.index');
    }
}