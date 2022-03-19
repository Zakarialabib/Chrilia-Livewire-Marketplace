<div>
    <form class="pt-3" wire:submit="save">
        <input type="text" wire:model="name" hidden>
        <input type="text" wire:model="device_count" hidden>
        <input type="text" wire:model="brand_slug" hidden>

        <button type="submit"
            class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
            {{ __('Save') }}
        </button>
    </form>
    <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-3 lg:-mx-2 xl:-mx-2">
        @foreach ($brands as $brand)
            <div
                class="sm:my-2 sm:px-2 sm:w-1/2 md:my-3 md:px-3 md:w-1/4 lg:my-2 lg:px-2 lg:w-1/4 xl:my-2 xl:px-2 xl:w-1/4 shadow rounded-lg relative">
                <div class="md:flex items-center justify-between">
                    <h2 class="text-2xl font-semibold leading-6 text-gray-800">
                        <a href="{{ route('admin.brands.detail', $brand->brand_slug) }}">
                            {{ $brand->name }}</a>
                    </h2>
                    <p class="text-2xl font-semibold md:mt-0 mt-4 leading-6 text-gray-800">
                        {{ $brand->device_count }}</p>

                </div>
                <div class="inline-flex">
                    <button
                        class="btn btn-sm text-white bg-red-500 border-red-800 hover:bg-red-600 active:bg-red-700 focus:ring-red-300"
                        wire:click="confirm('delete', {{ $brand->id }})" type="button" wire:loading.attr="disabled">
                        <x-heroicon-o-trash class="h-4 w-4" />
                </div>
            </div>
        @endforeach
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
