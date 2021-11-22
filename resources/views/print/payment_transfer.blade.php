<table class="table">
    <thead>
    <tr>
        <th>Customer Phone Number</th>
    </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)    
        <tr>
            <th>amount received</th>
            <td>{{ $payment->amount_received }} {{ config('settings.currency_symbol') }}</td>
        </tr>
        {{ $payment->created_at->format('d / m / Y') }}
        {{ $payment->order->code }}
        {{ $payment->client->name }}
        {{ $payment->client_amount }} {{ config('settings.currency_symbol') }}
        <tr>
            <th>client</th>
            <td>{{ $payment->client()->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>