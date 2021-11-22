<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form class="pt-3" enctype="multipart/form-data" wire:submit.prevent="submit" id="formPost">
        <div class="">
            <div class="mb-4">
                <label for="title">{{ __('Title') }}:</label>
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="title" placeholder="Enter Title" wire:model="post.title">
                @error('post.title') <span class="text-red-550">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <x-label for="body" :value="__('Content')" required />
                <x-input.rich-text wire:model.lazy="post.body" name="body" id="body" />
                <x-input-error for="body" />
            </div>
            <div class="mb-4">
                <x-label for="image" :value="__('Image')" />
                <input type="file" id="image" wire:model="post.image">
                <x-input-error for="image" />
            </div>
            <div class="mb-4">
                <label for="seo_title">{{ __('Seo title') }}:</label>
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="seo_title" placeholder="Enter Seo keyword" wire:model="post.seo_title">
                @error('post.seo_title') <span class="text-red-550">{{ $message }}</span>@enderror
            </div>
            <div class="mb-4">
                <label for="seo_desc">{{ __('Seo description') }}:</label>
                <textarea
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="seo_desc" wire:model="post.seo_desc" placeholder="Enter Seo description"></textarea>
                @error('post.seo_desc') <span class="text-red-550">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.pages.index') }}"
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