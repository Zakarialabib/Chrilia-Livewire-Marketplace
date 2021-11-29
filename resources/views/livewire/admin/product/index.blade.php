<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            
            <button
                class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled"
                {{ $this->selectedCount ? '' : 'disabled' }}>
                <x-heroicon-o-trash class="h-4 w-4" />
            </button>
            <form wire:submit.prevent="filterDate" class="flex justify-center ml-2">
                <x-select-list class="block bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" id="vendor_id" name="vendor_id"
                    wire:model="vendor_id" :options="$this->listsForFields['vendors']" />
            </form> 
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <div class="">
                <input type="text" wire:model.debounce.300ms="search" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    placeholder="{{ __('Search') }}" />
            </div>
        </div>  
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <x-table>
        <x-slot name="thead">
            <x-table.th>#</x-table.th>
            <x-table.th>
                {{ __('Vendor') }}
            </x-table.th>
            <x-table.th>
                {{ __('Code') }}
            </x-table.th>
            <x-table.th>
                {{ __('Name') }}
            </x-table.th>
            <x-table.th>
                {{ __('Stock') }}
            </x-table.th>
            <x-table.th>
                {{ __('Status') }}
            </x-table.th>
            <x-table.th>
                {{ __('Price') }} / {{ __('Wholesale Price') }}
            </x-table.th>
            <x-table.th>
                Actions
            </x-table.th>
            </tr>
        </x-slot>
        <x-table.tbody>
            @forelse($products as $product)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $product->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $product->vendor->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $product->code }}
                    </x-table.td>
                    <x-table.td>
                        {{ $product->name }}
                    </x-table.td>
                    <x-table.td>
                        @if ($product->stock === \App\Models\Product::STOCK_ACITVE)
                            <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                        @elseif($product->stock === \App\Models\Product::STOCK_INACTIVE)
                            <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                        @endif      
                    </x-table.td>
                    <x-table.td>
                        <livewire:toggle-button :model="$product" field="status" key="{{ $product->id }}" />
                    </x-table.td>
                    <x-table.td>
                        {{ $product->price }} / {{ $product->wholesale_price }}
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">
                            <a class="btn btn-sm text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300"
                                href="{{ route('admin.products.show', $product) }}"
                                class="flex items-center space-x-2">
                                <x-heroicon-o-eye class="h-4 w-4" />
                            </a>
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
            {{ $products->links() }}
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
