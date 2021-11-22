<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('client_profile_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::find(Auth::user()->id);

        return view('vendor.user.index', compact('user'));
    }

    public function create()
    {
        // abort_if(Gate::denies('client_profile_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.user.create');
    }

    public function edit(User $user)
    {
        // abort_if(Gate::denies('client_profile_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('vendor.user.edit', compact('user'));
    }

    public function show(User $user)
    {
        // abort_if(Gate::denies('client_profile_management'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $user->load('roles');

        return view('vendor.user.show', compact('user'));
    }
}
