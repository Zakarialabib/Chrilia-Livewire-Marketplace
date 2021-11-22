<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Fonts -->
    <title>{{ __('Order Invoice') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Global */
        body,
        ::before,
        ::after {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica';
            box-sizing: border-box;
        }

        body {
            width: 100%;
            height: auto;
        }

        .row {
            display: flex;
            flex-flow: row wrap;
        }

        /* Typography */
        h1,
        h2,
        h3,
        h4,
        p,
        a,
        td,
        th {
            line-height: 1.6;
            font-family: 'Nunito Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        td {
            font-size: .75rem;
        }

        thead th {
            font-weight: 700;
            border-top: .025px solid rgb(66, 66, 66);
            border-bottom: .025px solid rgb(66, 66, 66);
            font-size: .75rem;

        }

        @page {
            size: 600pt 800pt;
        }

        /* Components */
        table {
            margin-top: 2.5rem;
            width: 100%;
            border-collapse: collapse;
        }

        table tr:nth-child(even) {
            background-color: rgb(243, 243, 243);
            border-top: .025px solid rgb(187, 187, 187);
            border-bottom: .005px solid rgb(182, 182, 182);
        }

        tr,
        td,
        th {
            padding: 1rem;
            text-align: center;
        }

        .customer__data__header>* {
            margin: .25rem;
            padding: .25rem;
        }

        .customer__data__header .pdf .title {
            font-size: 3rem;
        }

        .company-info {
            font-size: .75rem;
        }

        .pdf {
            display: block;
            text-align: right;
        }

        .pdf .date {
            font-size: .75rem;
        }

        .badge {
            padding: .25rem .25rem;
            border-radius: .25rem;
            font-weight: 600;

        }

        .badge-success {
            color: white;
            background-color: rgb(0, 199, 0);
        }

        .badge-light {
            color: black;
            background-color: rgb(240, 239, 239);
        }

        .badge-danger {
            color: white;
            background-color: tomato;
        }

        .badge-warning {
            color: white;
            background-color: rgb(221, 221, 28);
        }

        .total {
            color: #FFF;
            background: rgb(124, 124, 124);

        }

        #container {
            display: block;

        }

        @media print {
            .hidden-print {
                display: none !important;
            }
        }

    </style>
</head>

<body>
    @php $url = url()->previous(); @endphp
    <div class="hidden-print container ">
        <div class="py-5 row">
            <a href="{{ $url }}" class="btn btn-secondary col-6 mt-2 btn-block">
                {{ __('Back') }}</a>
            <button onclick="window.print();" class="btn btn-primary col-6 btn-block">
                {{ __('Print') }}</button>
        </div>
        <br>
    </div>

    <main role="main" class="container">
        <div class="invoice">
            <div class="row invoice-info">
                <div class="col-md-4">
                    <address class="font-weight-light">
                        @if ($user->company_name == true)
                            {{ $user->company_name }}
                        @else
                            <strong>{{ config('settings.site_title') }}</strong>
                        @endif
                        <br>
                        {{ __('Phone') }}: {{ $user->phone }}<br>
                        {{ __('Email') }}: {{ $user->email }}
                    </address>
                </div>
                <div class="col-md-4">
                    <address class="font-weight-light">
                        <strong>{{ $order->receiver_name }}</strong><br>
                        {{ __('Phone') }}: {{ $order->receiver_phone }}<br>
                        {{ __('Address') }}: {{ $order->receiver_address }}
                    </address>
                </div>

                <div class="col-md-4 font-weight-light">
                    <b>{{ __('Order Number') }}: {{ $order->code }}</b><br>
                    <b>{{ __('Payment Status') }}:</b>
                    @switch($order->payment_status)
                        @case(\App\Models\Order::ORDER_INPAID)
                            <span class="badge bg-red-700 text-white ">{{ __('INPAID') }}</span>
                        @break
                        @case(\App\Models\Order::ORDER_PAID)
                            <span class="badge bg-green-700 text-white ">{{ __('PAID') }}</span>
                        @break
                        @default
                    @endswitch
                    <br>
                    <b>{{ __('Date') }}: {{ $order->created_at }}</b><br>
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-12 table-responsive--md">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('Order description') }}</th>
                                <th>{{ __('Subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="#">1</td>
                                <td data-label="productName">{{ $order->product_name }}</td>
                                <td data-label="Subtotal">{{ $order->price }}
                                    {{ config('settings.currency_symbol') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-30 mb-none-30">
                <div class="col-lg-12 mb-30">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">{{ __('Subtotal') }}:</th>
                                    <td>{{ $order->price }} {{ config('settings.currency_symbol') }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('Total') }}:</th>
                                    <td>{{ $order->price }} {{ config('settings.currency_symbol') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        localStorage.clear();

        function auto_print() {
            window.print()
        }
        setTimeout(auto_print, 1000);
    </script>
</body>

</html>
