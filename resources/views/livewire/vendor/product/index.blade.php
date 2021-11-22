<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-purple-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('client_product_management')
                <button
                    class="text-purple-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-purple-500 dark:border-gray-300 hover:text-purple-700  active:bg-purple-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <x-heroicon-o-trash class="h-4 w-4" />
                </button>
            @endcan

            <form class="ml-4" wire:submit.prevent="importFile">
                <input type="file" wire:model="file" placeholder="select a file" />
                <button
                    class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                    type="submit">{{ __('Import') }}</button>
            </form>
        </div>
    </div>
    {{-- <div class="flex">
            <input type="text" wire:model.debounce.300ms="search" class="w-full justify-center rounded border-gray-300" placeholder="search..." />
        </div> --}}
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="">
        <div class=" table-responsive">
            <table class="table w-full">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-2 py-3 ">
                            #
                        </th>
                        <th class="px-2 py-3 ">
                            {{ __('Code') }}
                        </th>
                        <th class="px-2 py-3 ">
                            {{ __('Status') }}
                        </th>
                        <th class="px-2 py-3 ">
                            {{ __('Name') }}
                        </th>
                        <th class="px-2 py-3 ">
                            {{ __('Category') }}
                        </th>
                        <th class="px-2 py-3 ">
                            {{ __('Price') }}
                        </th>
                        <th class="px-2 py-3 ">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse($products as $product)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-2 py-3">
                                <input type="checkbox" value="{{ $product->id }}" wire:model="selected">
                            </td>
                            <td class="px-2 py-3">
                                {{ $product->code }}
                            </td>
                            <td class="px-2 py-3">
                                @if ($product->status === \App\Models\Product::STOCK_ACITVE)
                                    <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                                @elseif($product->status === \App\Models\Product::STOCK_INACTIVE)
                                    <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                                @endif
                            </td>
                            <td class="px-2 py-3">
                                {{ $product->name }}
                            </td>
                            <td class="px-2 py-3">
                                {{ $product->category }}
                            </td>
                            <td class="px-2 py-3">
                                {{ $product->price }}
                            </td>
                            <td class="px-2 py-3">
                                <div class="inline-flex">
                                    @can('client_order_management')
                                        <a class="btn btn-sm text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300"
                                            href="{{ route('vendor.products.show', $product) }}"
                                            class="flex items-center space-x-2">
                                            <x-heroicon-o-eye class="h-4 w-4" />
                                        </a>
                                        <a class="btn btn-sm text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300 "
                                            href="{{ route('vendor.products.edit', $product) }}"
                                            class="flex items-center space-x-2">
                                            <x-heroicon-o-pencil-alt class="h-4 w-4" />
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                {{ __('No entries found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

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
