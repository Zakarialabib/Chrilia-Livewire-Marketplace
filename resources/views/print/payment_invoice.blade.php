<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Fonts -->
    <title>{{ __('Payment Invoice') }}</title>
    {{-- Custom Styling --}}
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

    </style>
</head>

<body>
    <div class="container">
        <div class="customer__data__header" style="">
            <div class="company-info" style="display:inline-block;">
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
                 
               </div>
            </div>

            <div class="pdf">
                <h1 class="title">{{ __('Payment list') }}</h1>
                <div class="date">
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <thead class="table-header">
                <tr class="table-col-name">
                    <th>{{ __('Date') }}</th>
                    <th>{{ __('Code') }}</th>
                    <th>{{ __('Client name') }}</th>
                    <th>{{ __('Order amount') }}</th>
                    <th>{{ __('Client Payout') }}</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>{{ $payment->created_at->format('d / m / Y') }}</td>
                    <td> {{ $payment->order->code }}</td>
                    <td>{{ $payment->client->name }}</td>
                    <td>{{ $payment->amount_received }} {{ config('settings.currency_symbol') }}</td>
                    <td>{{ $payment->client_amount }} {{ config('settings.currency_symbol') }}</td>
                </tr>
            </tbody>
            <tfoot class="total">
                <th>
                    <h4>{{ __('Total') }}</h4>
                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tfoot>
        </table>
    </div>
</body>

</html>
