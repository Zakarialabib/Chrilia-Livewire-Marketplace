@extends('layouts.dashboard')

@section('title', 'Sales Report')

@section('content')
    <div class="container-fluid">
        <livewire:admin.reports.sales-report :customers="\App\Models\User\User::all()"/>
    </div>
@endsection
