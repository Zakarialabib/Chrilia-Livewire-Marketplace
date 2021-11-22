<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap mb-4">
            <div class="lg:w-1/3 px-2 sm:w-full {{ $errors->has('user.name') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="name">{{ __('Name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="name" id="name" required wire:model.defer="user.name">
                <x-input-error for="user.name" />
            </div>
            <div class="lg:w-1/3 px-2 sm:w-full {{ $errors->has('user.email') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="email">{{ __('Email') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="email" name="email" id="email" required wire:model.defer="user.email">
                <x-input-error for="user.email" />
            </div>

            <div class="lg:w-1/3 px-2 sm:w-full {{ $errors->has('user.phone') ? 'is-invalid' : '' }}">
                <label class="form-label" for="phone">{{ __('Phone') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="phone" id="phone" wire:model.defer="user.phone">
                <x-input-error for="user.phone" />
            </div>
            <div class="lg:w-1/2 px-2 sm:w-full {{ $errors->has('user.company_name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="company_name">{{ __('Company name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="company_name" id="company_name" wire:model.defer="user.company_name">
                <x-input-error for="user.company_name" />
            </div>

            <div class="lg:w-1/2 px-2 sm:w-full {{ $errors->has('user.address') ? 'is-invalid' : '' }}">
                <label class="form-label" for="address">{{ __('Address') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="address" id="address" wire:model.defer="user.address">
                <x-input-error for="user.address" />
            </div>

            <div class="lg:w-1/2 px-2 sm:w-full {{ $errors->has('user.bank_name') ? 'is-invalid' : '' }}">
                <label class="form-label" for="bank_name">{{ __('Bank name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="bank_name" id="bank_name" wire:model.defer="user.bank_name">
                <x-input-error for="user.bank_name" />
            </div>
            <div class="lg:w-1/2 px-2 sm:w-full {{ $errors->has('user.rib_number') ? 'is-invalid' : '' }}">
                <label class="form-label" for="rib_number">{{ __('Rib number') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="rib_number" id="rib_number" wire:model.defer="user.rib_number">
                <x-input-error for="user.rib_number" />
            </div>
        </div>

        <div class="mb-4 {{ $errors->has('user.password') ? 'is-invalid' : '' }}">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                type="password" name="password" id="password" wire:model.defer="password">
            <x-input-error for="user.password" />
        </div>

        <div class="mb-4 {{ $errors->has('roles') ? 'is-invalid' : '' }}">
            <label class="form-label required" for="roles">{{ __('Roles') }}</label>
            <x-select-list
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']"
                multiple />
            <x-input-error for="roles" />
        </div>

        <div>
            <div class="pt-3">
                <div class="card-header-container flex flex-wrap">
                    <div class="inline-flex">
                        <button
                            class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                            type="button" wire:click.prevent="updateSubscriptions">
                            {{ __('Sync Subscriptions') }}
                        </button>
                    </div>
                </div>
                <table class="w-full rounded-t-lg m-5 mx-auto text-black">
                    <thead>
                        <tr class="text-left border-b bg-gray-100 border-gray-300">
                            <th class="px-4 py-3">
                                {{ __('Subscription Name') }}
                            </th>
                            <th class="px-4 py-3">
                                {{ __('Price') }}
                            </th>
                            <td>
                                Action
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $key => $subscription)
                            <tr class="border-b border-gray-600">
                                <td class="px-4 py-3">
                                    {{ $subscription['name'] }}
                                </td>
                                <td class="px-4 py-3">
                                    <input
                                        class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                                        type="number" name="subscription-{{ $key }}-price"
                                        id="subscription-{{ $key }}-price"
                                        wire:model="subscriptions.{{ $key }}.pivot.price" min="0">
                                </td>
                                <td class="px-4 py-3">
                                    <div class="inline-flex">
                                        <a class="text-red-500 bg-transparent border border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                                        href="#"
                                        wire:click.prevent="removeSubscription({{ $subscription['id'] }}, {{ $subscription['pivot']['user_id'] }})">
                                        <x-heroicon-o-trash class="h-4 w-4" />
                                    </a>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
