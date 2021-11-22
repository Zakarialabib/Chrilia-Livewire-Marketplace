<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap">
            <div class="w-1/3 px-2 mt-5 {{ $errors->has('name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="name">{{ __('Full Name') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="name" id="name" wire:model="name">
                <x-input-error for="name" />
            </div>
            <div class="w-1/3 px-2 mt-5 {{ $errors->has('email') ? 'is-invalid' : '' }}">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="email" name="email" id="email" disabled wire:model="email">
                <x-input-error for="email" />
            </div>
            <div class="w-1/3 px-2 mt-5 {{ $errors->has('phone') ? 'is-invalid' : '' }}">
                <label class="form-label" for="phone">{{ __('Phone') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="number" name="phone" id="phone" wire:model="phone">
                <x-input-error for="phone" />
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="w-1/2 px-2 mt-5 {{ $errors->has('company_name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="company_name">{{ __('Company name') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="company_name" id="company_name"
                    wire:model="company_name">
                    <x-input-error for="company_name" />
            </div>
            <div class="w-1/2 px-2 mt-5 {{ $errors->has('bank_name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="bank_name">{{ __('Bank name') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="bank_name" id="bank_name"
                    wire:model="bank_name">
                    <x-input-error for="bank_name" />
            </div>
        </div>
        <div class="w-full mt-5 px-2 {{ $errors->has('rib_number') ? 'is-invalid' : '' }}">
            <label class="form-label" for="rib_number">{{ __('Rib number') }}</label>
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="number" name="rib_number" id="rib_number"
                wire:model="rib_number">
                <x-input-error for="rib_number" />
        </div>
        <div class="w-full mt-5 px-2 {{ $errors->has('address') ? 'is-invalid' : '' }}">
            <label class="form-label" for="address">{{ __('Address') }}</label>
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="address" id="address" wire:model="address">
            <x-input-error for="address" />
        </div>
        <div class="w-full mt-5 px-2 {{ $errors->has('password') ? 'is-invalid' : '' }}">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="password" name="password" id="password" wire:model="password">
            <x-input-error for="password" />
        </div>
        <div class="mt-5">
            <button type="button" class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300" type="submit">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>
