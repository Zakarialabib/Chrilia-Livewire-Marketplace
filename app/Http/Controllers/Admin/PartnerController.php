<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{

    // Index Partner 
    public function index()
    {
        return view('admin.partner.index');
    }

    // Add Partner
    public function create()
    {
        return view('admin.partner.create');
    }

    // Partner Edit
    public function edit(Partner $partner)
    {
        return view('admin.partner.edit', compact('partner'));
    }
    
    // Partner  Show
    public function show(Partner $partner)
    {
        return view('admin.partner.show', compact('partner'));
    }
   
}