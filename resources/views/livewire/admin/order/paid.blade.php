<div x-data="{ showModal : false }">
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage" class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
                
                {{-- @can('order_delete') // To Do // --}}
                <button
                    class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled">
                    <x-heroicon-o-trash class="h-4 w-4" />
                </button>
                {{-- @endcan --}}

                <button wire:click="export" type="button"
                class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                    {{ __('XLS') }}
                </button>
                
            </div>

        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search') }}"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" />
        </div>
       
    </div>
    <div wire:loading.flex> {{ __('Loading') }}</div>

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">
                {{ __('Date') }}
                @include('components.table.sort', ['field' => 'created_at'])
            </x-table.th>
            <x-table.th>
                {{ __('Client') }}
            </x-table.th>
            <x-table.th>
                {{ __('Informations') }}
            </x-table.th>
            <x-table.th>
                {{ __('Vendor') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('status')" :direction="$sorts['status'] ?? null">
                {{ __('Status') }}
                @include('components.table.sort', ['field' => 'status'])
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>
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
                        {{ $order->client->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $order->receiver_name }} <p class="font-bold text-sm text-red-600">
                            {{ $order->receiver_phone }} - {{ $order->price }} {{ config('settings.currency_symbol') }} </p>
                    </x-table.td>
                    <x-table.td>
                        @livewire('admin.order.select-client', ['model' => $order, 'field' => 'vendor_id'],
                        key('client-'.$order->id))
                    </x-table.td>
                    <x-table.td>
                        @livewire('admin.order.select-status', ['order' => $order, 'status' => 'status'],
                        key($order->id))
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="btn btn-sm text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300"
                                href="{{ route('admin.orders.show', $order) }}">
                                <x-heroicon-o-eye class="h-4 w-4" />
                            </a>
                            <a class="btn btn-sm text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
                                href="{{ route('admin.orders.edit', $order) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                           {{-- @can('order_delete') // To Do // --}}

                            <button class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300" type="button"
                                wire:click="confirm('delete', {{ $order->id }})" wire:loading.attr="disabled">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </button>
                            {{-- @endcan --}}

                        </div>
                    </x-table.td>
                </x-table.tr>
            @empty
                <x-table.tr>
                    <x-table.td>
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
