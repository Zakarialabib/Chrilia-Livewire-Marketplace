<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.name') ? 'is-invalid' : '' }}">
                <x-label for="name" :value="__('Name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="name" id="name" required wire:model.defer="user.name">
                <x-input-error for="user.name" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.email') ? 'is-invalid' : '' }}">
                <x-label for="email" :value="__('Email')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="email" name="email" id="email" required wire:model.defer="user.email">
                <x-input-error for="user.email" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.phone') ? 'is-invalid' : '' }}">
                <x-label for="phone" :value="__('Phone')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="phone" id="phone" wire:model.defer="user.phone">
                <x-input-error for="user.phone" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2  {{ $errors->has('user.company_name') ? 'is-invalid' : '' }}">
                <x-label for="company_name" :value="__('Company name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="company_name" id="company_name" wire:model.defer="user.company_name">
                <x-input-error for="user.company_name" />
            </div>
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('user.address') ? 'is-invalid' : '' }}">
                <x-label for="address" :value="__('Address')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="address" id="address" required wire:model.defer="user.address">
                <x-input-error for="user.address" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2  {{ $errors->has('user.bank_name') ? 'is-invalid' : '' }}">
                <x-label for="bank_name" :value="__('Bank name')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="bank_name" id="bank_name" wire:model.defer="user.bank_name">
                <x-input-error for="user.bank_name" />
            </div>
            <div class="lg:ƒw-1/2 sm:w-full p-2 {{ $errors->has('user.rib_number') ? 'is-invalid' : '' }}">
                <x-label for="rib_number" :value="__('Rib number')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="rib_number" id="rib_number" wire:model.defer="user.rib_number">
                <x-input-error for="user.rib_number" />
            </div>
        </div>
        <div class="w-full {{ $errors->has('user.password') ? 'is-invalid' : '' }}">
            <x-label for="password" :value="__('Password')" required />
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                type="password" name="password" id="password" required wire:model.defer="password">
            <x-input-error for="user.password" />
        </div>
        <div class="mb-4 {{ $errors->has('roles') ? 'is-invalid' : '' }}">
            <x-label for="roles" :value="__('Roles')" required />
            <x-select-list
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']"
                multiple />
            <x-input-error for="roles" />
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.users.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
