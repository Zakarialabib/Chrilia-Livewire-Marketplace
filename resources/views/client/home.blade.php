@extends('layouts.web')
@section('title', __('Marketplace'))
@section('content')

<div class="bg-white dark:bg-dark-eval-1 w-full p-4">
    @livewire('client.products')
</div>

@endsection
