<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-500 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            <button
                class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled">
                <x-heroicon-o-trash class="h-4 w-4" />
            </button>
            <button wire:click="export()" type="button"
                class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                {{ __('XLS') }}
            </button>
            <button wire:click="exportInvoice()" type="button"
                class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
                {{ __('PDF') }}
            </button>
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search" placeholder="{{ __('Search') }}"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" />
        </div>
    </div>
    <div class="flex flex-wrap justify-center">
        <form wire:submit.prevent="filterDate" class="w-full pt-2">
            <div class="flex flex-wrap -mr-1 -ml-1">
                <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                    <x-label for="start_date" :value="__('Start Date')" required />
                    <input wire:model.defer="start_date" type="date"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                        name="start_date">
                    <x-input-error for="start_date" />
                </div>
                <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                    <x-label for="end_date" :value="__('End Date')" required />
                    <input wire:model.defer="end_date" type="date"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                        name="end_date">
                    <x-input-error for="end_date" />
                </div>
                <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                    <x-label for="vendor_id" :value="__('Client')" />
                    <x-select-list class="block appearance-none w-full py-2 px-2 mb-1" id="vendor_id" name="vendor_id"
                        wire:model="vendor_id" :options="$this->listsForFields['clients']" />
                </div>
            </div>
            <div class="w-full p-2">
                <button type="submit"
                    class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    <span wire:target="filterDate" wire:loading role="status" aria-hidden="true">
                        <x-loading />
                    </span>
                    {{ __('Filter') }}
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
                {{ __('Code') }}
            </x-table.th>
            <x-table.th>
                {{ __('Client name') }}
            </x-table.th>
            <x-table.th>
                {{ __('Amount') }}
            </x-table.th>
            <x-table.th>
                {{ __('Admin Amount') }}
            </x-table.th>
            <x-table.th>
                {{ __('Client Amount') }}
            </x-table.th>
            <x-table.th>
                {{ __('Vendor Amount') }}
            </x-table.th>
            <x-table.th>
                {{ __('Method') }}
                @include('components.table.sort', ['field' => 'method'])
            </x-table.th>
            <x-table.th>
                Action
            </x-table.th>
        </x-slot>
        <x-table.tbody class=" ">
            @forelse($payments as $payment)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $payment->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->created_at->format('d / m / Y') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->order->code }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->client->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->amount_received }} {{ config('settings.currency_symbol') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->admin_amount }} {{ config('settings.currency_symbol') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->client_amount }} {{ config('settings.currency_symbol') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $payment->client_amount }} {{ config('settings.currency_symbol') }}
                    </x-table.td>
                    <x-table.td>
                        @if ($payment->method == \App\Models\Payment::PAYMENT_BANK)
                            <span class="badge text-white bg-green-500">{{ __('BANK TRANSFER') }}</span>
                        @elseif($payment->method == \App\Models\Payment::PAYMENT_CASH)
                            <span class="badge text-white bg-red-500">{{ __('CASH') }}</span>
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="btn btn-sm btn-rose " href="{{ route('admin.payments.invoice', $payment) }}">
                                <x-heroicon-o-printer class="h-4 w-4" />
                            </a>
                            {{-- @can('payment_delete') // To Do // --}}
                            <button class="btn btn-sm btn-danger" type="button"
                                wire:click="confirm('delete', {{ $payment->id }})" wire:loading.attr="disabled">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </button>
                            {{-- @endcan --}}
                        </div>
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
        <x-table.tfoot>
            <x-table.tr>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td></x-table.td>
                <x-table.td> <strong>{{ $total_payment }} {{ config('settings.currency_symbol') }}</strong></x-table.td>
                <x-table.td> <strong>{{ $total_admin }} {{ config('settings.currency_symbol') }}</strong></x-table.td>
                <x-table.td> <strong>{{ $total_client }} {{ config('settings.currency_symbol') }}</strong></x-table.td>
                <x-table.td> <strong>{{ $total_client }} {{ config('settings.currency_symbol') }}</strong></x-table.td>
                <x-table.td></x-table.td>
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
            {{ $payments->links() }}
        </div>
    </div>

    <!-- Delete Payment Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">{{ __('Delete Selected Payments') }}</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">{{ __('Are you sure you? This action is irreversible.') }}</div>
            </x-slot>

            <x-slot name="footer">
                <button
                    class="btn border-gray-300 text-gray-700 dark:text-gray-300 active:bg-gray-50 active:text-gray-800 hover:text-gray-500 dark:active:bg-dark-eval-1 dark:active:text-gray-300 dark:hover:text-gray-700"
                    wire:click="$set('showDeleteModal', false)">{{ __('Go back') }}</button>

                <button class="btn text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600"
                    type="submit">{{ __('Delete') }}</button>
            </x-slot>
        </x-modal.confirmation>
    </form>

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
