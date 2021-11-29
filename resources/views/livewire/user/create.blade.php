<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.name') ? 'is-invalid' : '' }}">
                <x-label for="name" :value="__('Name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="name" id="name" required wire:model.defer="user.name">
                <x-input-error for="user.name" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.email') ? 'is-invalid' : '' }}">
                <x-label for="email" :value="__('Email')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="email" name="email" id="email" required wire:model.defer="user.email">
                <x-input-error for="user.email" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('user.phone') ? 'is-invalid' : '' }}">
                <x-label for="phone" :value="__('Phone')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="phone" id="phone" wire:model.defer="user.phone">
                <x-input-error for="user.phone" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2  {{ $errors->has('user.company_name') ? 'is-invalid' : '' }}">
                <x-label for="company_name" :value="__('Company name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="company_name" id="company_name" wire:model.defer="user.company_name">
                <x-input-error for="user.company_name" />
            </div>
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('user.address') ? 'is-invalid' : '' }}">
                <x-label for="address" :value="__('Address')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="address" id="address" required wire:model.defer="user.address">
                <x-input-error for="user.address" />
            </div>
        </div>
        <div class="w-full {{ $errors->has('user.password') ? 'is-invalid' : '' }}">
            <x-label for="password" :value="__('Password')" required />
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                type="password" name="password" id="password" required wire:model.defer="password">
            <x-input-error for="user.password" />
        </div>
        <div class="mb-4 {{ $errors->has('roles') ? 'is-invalid' : '' }}">
            <x-label for="roles" :value="__('Roles')" required />
            <x-select-list
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']"
                multiple />
            <x-input-error for="roles" />
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.users.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
