<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">
            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-blue-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @can('permission_delete')
                <button
                    class="text-blue-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-blue-500 dark:border-gray-300 hover:text-blue-700  active:bg-blue-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <x-heroicon-o-trash class="h-4 w-4" />
                </button>
            @endcan
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <input type="text" wire:model.debounce.300ms="search" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                placeholder="{{ __('Search') }}" />
        </div>
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
            <x-table.th sortable wire:click="sortBy('title')" :direction="$sorts['title'] ?? null">
                {{ __('Title') }}
                @include('components.table.sort', ['field' => 'title'])
            </x-table.th>
            <x-table.th>
                {{ __('Image') }}
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('active')" :direction="$sorts['active'] ?? null">
                {{ __('Status') }}
                @include('components.table.sort', ['field' => 'active'])
            </x-table.th>
            <x-table.th>
                Action
            </x-table.th>
        </x-slot>
        <x-table.tbody class="  ">
            @forelse($pages as $page)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $page->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $page->created_at->format('d M, Y h: i') }}
                    </x-table.td>
                    <x-table.td>
                        {{ $page->title }}
                    </x-table.td>
                    <x-table.td>
                        @if ($page->image != null)
                            <img src="{{ asset('uploads/' . $page->image) }}" id="image"
                                style="width: 150px; height: 150px;">
                        @else
                            <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                                style="width: 150px; height: 150px;">
                        @endif
                    </x-table.td>
                    <x-table.td>
                        <livewire:toggle-button :model="$page" field="active" key="{{ $page->id }}" />
                    </x-table.td>
                    <x-table.td>
                        <div class="inline-flex">                            <a class="btn btn-sm text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300" href="{{ route('admin.pages.edit', $page) }}">
                                <x-heroicon-o-pencil-alt class="h-4 w-4" />
                            </a>
                            <a href="{{ route('page.show', $page->slug) }}" class="btn btn-sm bg-green-500 text-white">
                                <x-heroicon-o-eye class="h-4 w-4" />
                            </a>
                            <button class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                            wire:click="confirm('delete', {{ $page->id }})" type="button"
                            wire:loading.attr="disabled">
                            <x-heroicon-o-trash class="h-4 w-4" />
                        </button>
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
            {{ $pages->links() }}
        </div>
    </div>
 
    <!-- Delete Page Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">{{ __('Delete Selected Pages') }}</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">{{ __('Are you sure you? This action is irreversible.') }}</div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn border-gray-300 text-gray-700 dark:text-gray-300 active:bg-gray-50 dark:active:text-gray-800 hover:text-gray-500 dark:active:bg-dark-eval-1 active:text-gray-300 dark:hover:text-gray-700" wire:click="$set('showDeleteModal', false)">{{ __('Go back') }}</button>

                <button class="btn text-white bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 border-indigo-600" type="submit">{{ __('Delete') }}</button>
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
