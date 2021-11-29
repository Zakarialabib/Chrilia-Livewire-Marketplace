<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="pt-3" enctype="multipart/form-data" wire:submit.prevent="submit">

        <div class="flex flex-wrap">
            <div class="w-3/4 p-2 mb-4">
                <x-label for="title" :value="__('Title')" required />
                <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                id="title" placeholder="Enter Title" wire:model="section.title">
                <x-input-error for="section.title" />
            </div>
            <div class="w-1/4 p-2 mb-4">
                <x-label for="position" :value="__('Position')" required />
                <input name="" id="" wire:model="section.position" disabled
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" >
                    
                <x-input-error for="section.position" />
            </div>
        </div>
        <div class="mb-4">
            <x-label for="description" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="section.description" id="description" />
            <x-input-error for="section.description" />
        </div>
        <div class="flex flex-wrap mb-4">

            <div class="lg:w-1/2 sm:w-full p-2">
                <div class="my-2">
                    @if ($image != null)
                        <img src="{{ asset('uploads/' . $image) }}" id="image"
                            style="width: 150px; height: 150px;">
                    @else
                        <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                            style="width: 150px; height: 150px;">
                    @endif
                </div>
                <div class="my-2">
                    <x-label for="image" :value="__('Image')" />
                    <input type="file"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                        id="image" wire:model="image">
                    <x-input-error for="image" />
                </div>
            </div>

            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="bg_color" :value="__('Background color')" />
                <input type="color" name="bg_color" id="bg_color"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                wire:model="section.bg_color">
                <x-input-error for="section.bg_color" />
            </div>
            
        </div>
        <div class="flex flex-wrap mb-4">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="featured_title" :value="__('Featured title')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    id="featured_title" wire:model="section.featured_title">
                <x-input-error for="section.featured_title" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="label" :value="__('label')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    id="label" wire:model="section.label">
                <x-input-error for="section.label" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="link" :value="__('Link')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    id="link" wire:model="section.link">
                <x-input-error for="section.link" />
            </div>
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.sections.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>

@push('scripts')
     <!-- Image Upload -->
     <script type="text/javascript"  src="{{ asset('js/image-upload.js') }}"></script>
@endpush