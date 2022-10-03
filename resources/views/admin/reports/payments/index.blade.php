@extends('layouts.dashboard')

@section('title', 'Payments Report')

@section('content')
    <div class="container-fluid">
        <livewire:admin.reports.payments-report/>
    </div>
@endsection
