<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="pt-3" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="flex flex-wrap">
            <div class="w-3/4 p-2 mb-4">
                <x-label for="title" :value="__('Title')" required />
                <input type="text"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                id="title" placeholder="Enter Title" wire:model="section.title">
                <x-input-error for="section.title" />
            </div>
            <div class="w-1/5 p-2 mb-4">
                <x-label for="position" :value="__('Position')" required />
                <select name="" id="" wire:model="section.position"
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500">
                    <option value="none">{{__('none')}}</option>
                    <option value="1">{{__('1')}}</option>
                    <option value="2">{{__('2')}}</option>
                    <option value="3">{{__('3')}}</option>
                    <option value="4">{{__('4')}}</option>
                </select>
                <x-input-error for="section.position" />
            </div>
        </div>
        <div class="p-2 mb-4">
            <x-label for="description" :value="__('Description')" />
            <x-input.rich-text wire:model.lazy="section.description" id="description" />
            <x-input-error for="section.description" />
        </div>
        <div class="flex flex-wrap mb-4">

            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="image" :value="__('Image')" />
                <input type="file"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                id="image" wire:model="image">
                <x-input-error for="image" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="bg_color" :value="__('Background color')" />
                <input type="color" name="bg_color" id="bg_color"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                wire:model="section.bg_color">
                <x-input-error for="section.bg_color" />
            </div>
            
        </div>
        <div class="flex flex-wrap mb-4">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="featured_title" :value="__('Featured title')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="featured_title" wire:model="section.featured_title">
                <x-input-error for="section.featured_title" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="label" :value="__('label')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="label" wire:model="section.label">
                <x-input-error for="section.label" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="link" :value="__('Link')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="link" wire:model="section.link">
                <x-input-error for="section.link" />
            </div>
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.sections.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>

@push('scripts')
     <!-- Image Upload -->
     <script type="text/javascript"  src="{{ asset('js/image-upload.js') }}"></script>
@endpush