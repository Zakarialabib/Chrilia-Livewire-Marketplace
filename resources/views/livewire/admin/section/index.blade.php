<div>
    <div class="flex flex-wrap justify-center">
        <div class="lg:w-1/2 md:w-1/2 sm:w-full flex flex-wrap my-md-0 my-2">

            <select wire:model="perPage"
                class="w-20 block p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm focus:shadow-outline-blue focus:border-purple-300 mr-3">
                @foreach ($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('permission_delete')
                <button
                    class="text-purple-500 dark:text-gray-300 bg-transparent dark:bg-dark-eval-2 border border-purple-500 dark:border-gray-300 hover:text-purple-700  active:bg-purple-600 font-bold uppercase text-xs p-3 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled"
                    {{ $this->selectedCount ? '' : 'disabled' }}>
                    <x-heroicon-o-trash class="h-4 w-4" />
                </button>
            @endcan
        </div>
        <div class="lg:w-1/2 md:w-1/2 sm:w-full my-2 my-md-0">
            <div class="">
                <input type="text" wire:model.debounce.300ms="search" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    placeholder="{{ __('Search') }}" />
            </div>
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="">
        <div class=" table-responsive">
            <x-table>
                <x-slot name="thead">
                    <x-table.th>#</x-table.th>
                    <x-table.th>
                        {{ __('Date') }}
                    </x-table.th>
                    <x-table.th>
                        {{ __('Title') }}
                    </x-table.th>
                    <x-table.th>
                        {{ __('Status') }}
                    </x-table.th>
                    <x-table.th>
                        Action
                    </x-table.th>
                </x-slot>
                <x-table.tbody>
                    @forelse($sections as $section)
                        <x-table.tr>
                            <x-table.td>
                                <input type="checkbox" value="{{ $section->id }}" wire:model="selected">
                            </x-table.td>
                            <x-table.td>
                                {{ $section->created_at->format('d M, Y h: i') }}
                            </x-table.td>
                            <x-table.td>
                                {{ $section->title }}
                            </x-table.td>
                            <x-table.td>
                                @if ($section->status == \App\Models\Section::STATUS_ACITVE)
                                    <span class="badge text-white bg-green-500">{{ __('Active') }}</span>
                                @elseif($section->status == \App\Models\Section::STATUS_INACTIVE)
                                    <span class="badge text-white bg-red-500">{{ __('Inactive') }}</span>
                                @endif
                            </x-table.td>
                            <x-table.td>
                                <div class="inline-flex">
                                    <a class="btn btn-sm text-white bg-green-500 border-green-800 hover:bg-green-600 active:bg-green-700 focus:ring-green-300"
                                        href="">
                                        <x-heroicon-o-eye class="h-4 w-4" />
                                    </a>
                                    <a class="btn btn-sm text-white bg-blue-500 border-blue-800 hover:bg-blue-600 active:bg-blue-700 focus:ring-blue-300"
                                        href="{{ route('admin.sections.edit', $section->id) }}">
                                        <x-heroicon-o-pencil-alt class="h-4 w-4" />
                                    </a>
                                    <button class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300 " type="button"
                                        wire:click="confirm('delete', {{ $section->id }})"
                                        wire:loading.attr="disabled">
                                        <x-heroicon-o-trash class="h-4 w-4" />
                                    </button>
                                </div>
                            </x-table.td>
                            </x-table.>
                        @empty
                            <x-table.tr>
                                <x-table.td colspan="10" class="text-center">
                                    {{ __('No entries found.') }}
                                </x-table.td>
                            </x-table.tr>
                    @endforelse
                </x-table.tbody>
            </x-table>
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
            {{ $sections->links() }}
        </div>
    </div>

    <!-- Delete Section Modal -->
    <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">{{ __('Delete Selected Sections') }}</x-slot>

            <x-slot name="content">
                <div class="py-8 text-cool-gray-700">{{ __('Are you sure you? This action is irreversible.') }}</div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn border-gray-300 text-gray-700 dark:text-gray-300 active:bg-gray-50 active:text-gray-800 hover:text-gray-500 active:bg-dark-eval-1 active:text-gray-300 hover:text-gray-700" wire:click="$set('showDeleteModal', false)">{{ __('Cancel') }}</button>

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
