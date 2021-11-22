<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class SubscriptionController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('subscription_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscription.index');
    }

    public function create()
    {
        // abort_if(Gate::denies('subscription_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscription.create');
    }

    public function edit(Subscription $subscription)
    {
        // abort_if(Gate::denies('subscription_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscription.edit', compact('subscription'));
    }

    public function show(Subscription $subscription)
    {
        // abort_if(Gate::denies('subscription_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.subscription.show', compact('subscription'));
    }
}
