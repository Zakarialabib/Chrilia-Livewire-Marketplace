<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function show()
    {
        $subscriptions = Auth::user()->subscriptions;
        return view('vendor.subscription.show', compact('subscriptions'));
    }
}