<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="flex flex-wrap">
            <div class="lg:w-1/4 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.code') ? 'is-invalid' : '' }}">
                <x-label for="product_code" :value="__('Code')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="product_code" id="product_code" required
                wire:model.defer="product.code">
                <x-input-error for="product.code" />
            </div>
            
            <div class="lg:w-1/4 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.name') ? 'is-invalid' : '' }}">
                <x-label for="product_name" :value="__('Name')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="product_name" id="product_name" required
                wire:model.defer="product.name">
                <x-input-error for="product.name" />
            </div>
            <div class="lg:w-1/4 md:w-1/2 sm:w-full p-2">
                <x-label for="product_price" :value="__('Price')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="number" name="product_price" id="product_price"
                    wire:model="product.price">
                <x-input-error for="product.price" />
            </div>
            <div class="lg:w-1/4 md:w-1/2 sm:w-full p-2">
                <x-label for="product_wholesale_price" :value="__('Wholesale Price')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="number" name="wholesale_price" id="wholesale_price"
                    wire:model="product.wholesale_price">
                <x-input-error for="product.wholesale_price" />
            </div>
        </div>
            
        <div class="mb-4 p-2 {{ $errors->has('product.image') ? 'is-invalid' : '' }}">
            <x-label for="product-image" :value="__('Image')" />
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="file" name="product-image" id="product_image"
                wire:model.defer="product.image">
            <x-input-error for="product.image" />
        </div>

        <div class="mb-4 p-2 {{ $errors->has('product.description') ? 'is-invalid' : '' }}">
            <x-label for="product_description" :value="__('Description')" />
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="product_description" id="product_description"
                wire:model.defer="product.description">
            <x-input-error for="product.description" />
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
