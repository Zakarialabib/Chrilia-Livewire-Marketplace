@extends('layouts.dashboard')
@section('title', 'POS')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <livewire:admin.search-product/>
                <livewire:admin.pos.product-list :categories="$product_categories"/>
            </div>
            <div class="col-lg-5">
                <livewire:admin.pos.checkout :cart-instance="'sale'" :customers="$customers"/>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            window.addEventListener('showCheckoutModal', event => {
                $('#checkoutModal').modal('show');
                $('#paid_amount').maskMoney({
                   
                    allowZero: false,
                });
                $('#total_amount').maskMoney({
                   
                    allowZero: true,
                });
                $('#paid_amount').maskMoney('mask');
                $('#total_amount').maskMoney('mask');
                $('#checkout-form').submit(function () {
                    var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                    $('#paid_amount').val(paid_amount);
                    var total_amount = $('#total_amount').maskMoney('unmasked')[0];
                    $('#total_amount').val(total_amount);
                });
            });
        });
    </script>

@endpush