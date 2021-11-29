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
                type="button" wire:click="$toggle('showDeleteModal')" wire:loading.attr="disabled">
                <x-heroicon-o-trash class="h-4 w-4" />
            </button>
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
            <x-table.th sortable wire:click="sortBy('created_at')" :direction="$sorts['created_at'] ?? null">
                {{ __('Created at') }}
                @include('components.table.sort', ['field' => 'created_at'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('name')" :direction="$sorts['name'] ?? null">
                {{ __('Name') }}
                @include('components.table.sort', ['field' => 'name'])
            </x-table.th>
            <x-table.th sortable wire:click="sortBy('email')" :direction="$sorts['email'] ?? null">
                {{ __('Email') }}
                @include('components.table.sort', ['field' => 'email'])
            </x-table.th>
            <x-table.th>
                {{ __('Phone') }}
            </x-table.th>
            <x-table.th>
                {{ __('Subject') }}
            </x-table.th>
            <x-table.th>
                {{ __('Actions') }}
            </x-table.th>
        </x-slot>
        <x-table.tbody>
            @forelse($contacts as $contact)
                <x-table.tr>
                    <x-table.td>
                        <input type="checkbox" value="{{ $contact->id }}" wire:model="selected">
                    </x-table.td>
                    <x-table.td>
                        {{ $contact->created_at }}
                    </x-table.td>
                    <x-table.td>
                        {{ $contact->name }}
                    </x-table.td>
                    <x-table.td>
                        {{ $contact->email }}
                    </x-table.td>
                    <x-table.td>
                        {{ $contact->phone_number }}
                    </x-table.td>
                    <x-table.td>
                        {{ $contact->subject }}
                    </x-table.td>
                    <x-table.td>
                        <button class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                            wire:click="confirm('delete', {{ $contact->id }})" type="button">
                            <x-heroicon-o-trash class="h-4 w-4" />
                        </button>
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
            {{ $contacts->links() }}
        </div>
    </div>

       <!-- Delete Contact Modal -->
       <form wire:submit.prevent="deleteSelected">
        <x-modal.confirmation wire:model.defer="showDeleteModal">
            <x-slot name="title">{{ __('Delete Selected Contacts') }}</x-slot>

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
