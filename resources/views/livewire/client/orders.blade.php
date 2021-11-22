<div>

    <div class="grid gap-6 mb-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 w-full">
        @forelse($orders as $order)
            <div
                class="p-6 space-y-6 duration-300 transform bg-gray-200 h-96 w-80 rounded-2xl rotate-3 hover:rotate-0 top-1/2 left-1/2 shadow-lg">
                <div class="flex justify-end">
                    {{ $order->code }}
                </div>

                <header class="text-xl font-extrabold text-center text-gray-600">
                    {{ $order->created_at->format('d / m / Y') }}</header>

                <div>
                    <p class="text-xl font-extrabold text-center text-gray-900">
                        {{ $order->receiver_name }} <br>{{ $order->receiver_phone }} <br> {{ $order->receiver_address }}
                    </p>
                    <p class="text-4xl font-extrabold text-center mt-3">
                        @if ($order->status == \App\Models\Order::STATUS_PENDING)
                            <span class="text-green-500">{{ __('Pending') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                            <span class="text-blue-500 ">{{ __('Processing') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                            <span class="text-red-500">{{ __('Collecting') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_CONFIRMED)
                            <span class="text-blue-300 ">{{ __('Confirmed') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_SHIPPING)
                            <span class="text-orange-500 ">{{ __('Shipping') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_CANCELED)
                            <span class="text-red-500">{{ __('Canceled') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                            <span class="text-green-700  ">{{ __('Completed') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_RETURNED)
                            <span class="text-red-700 ">{{ __('Returned') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_PAID)
                            <span class="text-blue-700 ">{{ __('PAID') }}</span>
                        @endif
                    </p>
                    <div class="flex justify-center mt-3 text-xl font-extrabold text-center text-gray-600">
                        <p class="text-center">{{ $order->price }} {{ config('settings.currency_symbol') }}</p>
                    </div>
                    <div class="flex justify-center mt-3">
                        @livewire('admin.order.select-status', ['order' => $order, 'status' => 'status'],
                    key($order->id))                    
                    </div>
               </div>
            </div>
        @empty

            {{ __('No entries found.') }}

        @endforelse
    </div>


</div>
