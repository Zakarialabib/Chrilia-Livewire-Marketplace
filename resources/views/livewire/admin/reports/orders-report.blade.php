<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-purple-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <button wire:click="export" type="button"
                class="text-purple-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-purple-500 dark:border-gray-300 hover:text-purple-700  active:bg-purple-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                {{ __('XLS') }}
            </button>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search') }}"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" />
        </div>
        <form wire:submit.prevent="generateReport" class="w-full pt-2">
            <div class="flex flex-wrap">
                <div class="w-1/3 px-2 py-2">
                    <x-label for="start_date" :value="__('Start Date')" required />
                    <input wire:model.defer="start_date" type="date"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        name="start_date">
                    <x-input-error for="start_date" />
                </div>
                <div class="w-1/3 px-2 py-2">
                    <x-label for="end_date" :value="__('End Date')" required />
                    <input wire:model.defer="end_date" type="date"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        name="end_date">
                    <x-input-error for="end_date" />
                </div>
                <div class="w-1/3 px-2 py-2">
                    <x-label for="vendor_id" :value="__('Client')" />
                    <x-select-list class="block appearance-none w-full py-2 px-2 mb-1" id="vendor_id" name="vendor_id"
                        wire:model="vendor_id" :options="$this->listsForFields['clients']" />
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-1/2 px-2 py-2">
                    <x-label for="status" :value="__('Status')" />
                    <select wire:model.defer="status"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        name="status">
                        <option value="">{{ __('Select Status') }}</option>
                        <option value='{{ App\Models\ORDER::STATUS_PENDING }}'>{{ __('Pending') }}</option>
                        <option value='{{ App\Models\ORDER::STATUS_PROCESSING }}'>{{ __('Processing') }}</option>

                        <option value='{{ App\Models\ORDER::STATUS_COLLECTING }}'>{{ __('Collecting') }}</option>

                        <option value='{{ App\Models\ORDER::STATUS_CONFIRMED }}'>{{ __('Confirmed') }}</option>
                        <option value='{{ App\Models\ORDER::STATUS_SHIPPING }}'>{{ __('Shipping') }}</option>

                        <option value='{{ App\Models\ORDER::STATUS_CANCELED }}'>{{ __('Canceled') }}</option>

                        <option value='{{ App\Models\ORDER::STATUS_COMPLETED }}'>{{ __('Completed') }}</option>
                        <option value='{{ App\Models\ORDER::STATUS_RETURNED }}'>{{ __('Returned') }}</option>
                        <option value='{{ App\Models\ORDER::STATUS_PAID }}'>{{ __('PAID') }}</option>
                    </select>
                </div>
                <div class="w-1/2 px-2 py-2">
                    <x-label for="payment_status" :value="__('Payment Status')" />
                    <select wire:model.defer="payment_status"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        name="payment_status">
                        <option value="">{{ __('Select Payment Status') }}</option>
                        <option value='{{ App\Models\ORDER::ORDER_INPAID }}'>{{ __('INPAID') }}</option>
                        <option value='{{ App\Models\ORDER::ORDER_PAID }}'>{{ __('PAID') }}</option>
                    </select>
                </div>
            </div>
            <div class="w-full px-2 py-2">
                <button type="submit"
                    class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                    <span wire:target="generateReport" wire:loading role="status" aria-hidden="true">
                        <x-loading />
                    </span>
                    {{ __('Filter Report') }}
                </button>
            </div>
        </form>
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
                {{ __('Status') }}
                @include('components.table.sort', ['field' => 'status'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('payment_status')" :direction="$sorts['payment_status'] ?? null">
                {{ __('Payment Status') }}
                @include('components.table.sort', ['field' => 'payment_status'])
            </x-table.th>
            <x-table.th>
                {{ __('Amount') }}
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
                        @if ($order->status == \App\Models\Order::STATUS_PENDING)
                            <span class="badge text-white bg-green-500">{{ __('Pending') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                            <span class="badge bg-blue-500 text-white">{{ __('Processing') }}</span>
                        @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                            <span class="badge text-white bg-indigo-500">{{ __('Collecting') }}</span>
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
                        @switch($order->payment_status)
                            @case(\App\Models\Order::ORDER_INPAID)
                            <span class="badge bg-red-700 text-white ">{{ __('INPAID') }}</span>
                                @break
                            @case(\App\Models\Order::ORDER_PAID)
                            <span class="badge bg-green-700 text-white ">{{ __('PAID') }}</span>
                                @break
                            @default
                        @endswitch
                    </x-table.td>
                    <x-table.td>
                        {{ $order->price }} {{ config('settings.currency_symbol') }}
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
        <x-table.tfoot>
            <x-table.tr>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td> <strong> {{ $total }} {{ config('settings.currency_symbol') }} </strong></x-table.td>
            </x-table.tr>
        </x-table.tfoot>
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
