<div>
    <form wire:submit.prevent="onClearCache">
        <button
            class="px-3 py-2 text-sm leading-4 font-medium rounded-md border-0 focus:outline-none focus:ring bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 transition ease-in-out duration-150">
            <span>
                <div wire:loading wire:target="onClearCache">
                    <x-loading />
                </div>
                <span>{{ __('Clear all Cache') }}</span>
            </span>
        </button>
    </form>
</div>
