<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
       
        <div class="w-full mb-4">
            @if ($banner_image != null)
            <img src="{{ asset('uploads/' . $banner_image) }}"
               loading="lazy" class="w-full max-h-40 object-cover" />
            @else
                <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                    class="max-h-40 w-full object-cover" />
            @endif
            <x-label for="banner_image" :value="__('Banner Image')" />
            <input type="file"
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                id="banner_image" wire:model="banner_image">
                <x-input-error for="banner_image" />
        </div>
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 sm:w-1/2 px-2 mt-5 {{ $errors->has('name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="name">{{ __('Full Name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="name" id="name" wire:model="name">
                <x-input-error for="name" />
            </div>
            <div class="lg:w-1/3 sm:w-1/2 px-2 mt-5 {{ $errors->has('email') ? 'is-invalid' : '' }}">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="email" name="email" id="email" disabled wire:model="email">
                <x-input-error for="email" />
            </div>
            <div class="lg:w-1/3 sm:w-1/2 px-2 mt-5 {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                <label class="form-label" for="phone">{{ __('Phone') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="phone" id="phone" wire:model="phone">
                <x-input-error for="phone" />
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 sm:w-1/2 px-2 mt-5 {{ $errors->has('company_name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="company_name">{{ __('Company name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="company_name" id="company_name" wire:model="company_name">
                <x-input-error for="company_name" />
            </div>
            <div class="lg:w-1/3 sm:w-1/2 px-2 mt-5 {{ $errors->has('telegram_link') ? 'is-invalid' : '' }}">
                <label class="form-label" for="telegram_link">{{ __('Telegram Link') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="telegram_link" id="telegram_link" wire:model="telegram_link">
                <x-input-error for="telegram_link" />
            </div>
            <div class="lg:w-1/3 sm:w-1/2 mt-5 px-2 {{ $errors->has('whatsapp_number') ? 'is-invalid' : '' }}">
                <label class="form-label" for="whatsapp_number">{{ __('Whatsapp number') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="whatsapp_number" id="whatsapp_number" wire:model="whatsapp_number">
                <x-input-error for="whatsapp_number" />
            </div>
        </div>

        <div class="w-full mt-5 px-2 {{ $errors->has('address') ? 'is-invalid' : '' }}">
            <label class="form-label" for="address">{{ __('Address') }}</label>
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                type="text" name="address" id="address" wire:model="address">
            <x-input-error for="address" />
        </div>
        <div class="w-full mt-5 px-2 {{ $errors->has('password') ? 'is-invalid' : '' }}">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                type="password" name="password" id="password" wire:model="password">
            <x-input-error for="password" />
        </div>
        <div class="mt-5">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="submit">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>
