<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
    <form class="pt-3" enctype="multipart/form-data" wire:submit.prevent="submit">
        <div class="">
            <div class="mb-4">
                <x-label for="title" :value="__('Title')" required />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="title" wire:model="post.title">
                <x-input-error for="post.title" />
            </div>
            <div class="mb-4">
                <x-label for="body" :value="__('Content')" required />
                <x-input.rich-text wire:model.lazy="post.body" id="body" />
                <x-input-error for="post.body" />
            </div>
            <div class="grid justify-center my-2">
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
                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                        id="image" wire:model="image">
                    <x-input-error for="image" />
                </div>
            </div>
            <div class="mb-4">
                <x-label for="seo_title" :value="__('Seo title')" />
                <input type="text"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="seo_title" wire:model="post.seo_title">
                <x-input-error for="post.seo_title" />
            </div>
            <div class="mb-4">
                <x-label for="seo_desc" :value="__('Seo description')" />
                <textarea
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    id="seo_desc" wire:model="post.seo_desc"></textarea>
                <x-input-error for="post.seo_desc" />
            </div>
        </div>

        <div class="float-right p-2 mb-4">
            <button type="submit"
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.posts.index') }}"
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