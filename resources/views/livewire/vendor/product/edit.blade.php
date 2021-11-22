<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="flex flex-wrap -m-2">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.code') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="product_code">{{ __('Code') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="product_code" id="product_code" required wire:model.defer="product.code">
                <x-input-error for="product.code" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.name') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="product_name">{{ __('Name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="product_name" id="product_name" required wire:model.defer="product.name">
                <x-input-error for="product.name" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="product_price">{{ __('Price') }}</label>
                <input :value="old('product.price')"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="product_price" id="product_price" required wire:model="product.price">
                <x-input-error for="product.price" />
            </div>
        </div>

        <div class="flex flex-wrap -m-2">
          
            <div class="p-2 w-1/2 {{ $errors->has('product.image') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="product_image">{{ __('Image') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="file" name="product_image" id="product_image" required wire:model.defer="product.image">
                <x-input-error for="product.image" />
            </div>

            <div class="p-2 w-1/2 {{ $errors->has('product.description') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="product_description">{{ __('Description') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="product_description" id="product_description" required
                    wire:model.defer="product.description">
                <x-input-error for="product.description" />
            </div>
        </div>

        <div class="w-full p-2">
            <button
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('vendor.products.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
