<div>
    <div class="flex flex-wrap justify-center">
        <div class="w-1/2 px-2 flex flex-row my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-purple-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @can('client_order_management')
                <button
                    class="text-purple-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-purple-500 dark:border-gray-300 hover:text-purple-700  active:bg-purple-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <x-heroicon-o-trash class="h-4 w-4" />
                </button>
            @endcan
        </div>

        {{-- <div class="w-full sm:w-1/2 sm:text-right">
            <input type="text" wire:model.debounce.300ms="search" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" placeholder="{{ __('Search') }}" />
        </div> --}}
    </div>

    <div wire:loading.delay>
        Loading...
    </div>

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">
                {{ __('Date') }}
                @include('components.table.sort', ['field' => 'created_at'])
            </x-table.th>
            <x-table.th>
                {{ __('Code') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('status')" :direction="$sorts['status'] ?? null">
                {{ __('Status') }}
                @include('components.table.sort', ['field' => 'status'])
            </x-table.th>
            <x-table.th>
                {{ __('Price') }}
            </x-table.th>
            <x-table.th>{{ __('Actions') }}</x-table.th>
        </x-slot>
        <x-table.tbody>
            @forelse($orders as $order)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $order->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $order->created_at->format('d / m / Y') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $order->code }}
                    </x-table.td>
                    <x-table.td>
                        @if ($order->status == \App\Models\Order::STATUS_PENDING)
                            <span class="badge text-white bg-green-500">{{ __('Pending') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                            <span class="badge bg-blue-500 text-white">{{ __('Processing') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                            <span class="badge text-white bg-red-500">{{ __('Collecting') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_CONFIRMED)
                            <span class="badge bg-blue-300 text-black ">{{ __('Confirmed') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_SHIPPING)
                            <span class="badge bg-orange-500 text-white">{{ __('Shipping') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_CANCELED)
                            <span class="badge text-white bg-red-500">{{ __('Canceled') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                            <span class="badge bg-green-700 text-white ">{{ __('Completed') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_RETURNED)
                            <span class="badge bg-red-700 text-white">{{ __('Returned') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_PAID)
                            <span class="badge bg-blue-700 text-white">{{ __('PAID') }}</span>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        {{ $order->price }} {{ config('settings.currency_symbol') }}
                    </x-table.td>
                    <x-table.td>
                        @can('client_order_management')
                            <div class="flex item-center justify-center cursor-pointer">
                                <a class="btn btn-sm btn-primary " href="{{ route('vendor.orders.show', $order) }}">
                                    <x-heroicon-o-eye class="h-4 w-4" />
                                </a>
                                <a class="btn btn-sm btn-success " href="{{ route('vendor.orders.edit', $order) }}">
                                    <x-heroicon-o-pencil-alt class="h-4 w-4" />
                                </a>
                                <a class="btn btn-sm btn-rose " href="{{ route('vendor.orders.invoice', $order) }}">
                                    <x-heroicon-o-printer class="h-4 w-4" />
                                </a>
                            </div>
                        @endcan
                    </x-table.td>
                </x-table.tr>
            @empty
                <x-table.tr>
                    <x-table.td colspan="10" class="text-center">
                        {{ __('No entries found.') }}
                    </x-table.td>
                </x-table.tr>
            @endforelse
        </x-table.tbody>
    </x-table>

    <div class="p-4">
        <div class="pt-3">
            @if ($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $orders->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
            if (!confirm("{{ __('Are you sure') }}")) {
                return
            }
            @this[e.callback](...e.argv)
        });
    </script>
@endpush
