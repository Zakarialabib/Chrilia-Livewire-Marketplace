<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="onUpdateSMTP" wire:ignore class="p-3">
        <div>
            <div class="w-full p-2">
                <x-label name="host" for="host" :value="__('Host') " />
                    <input id="host" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" ms-auto" type="text" wire:model="host"
                        placeholder="smtp.gmail.com">
                    <small class="text-red-500">{{ __('Your mail server.') }}</small>
            </div>
            <div class="w-full p-2">
                <x-label name="port"  for="port" :value=" __('Port') " />
                    <input id="port" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" ms-auto" type="text" wire:model="port" placeholder="587">
                    <small class="text-red-500">{{ __('The port to your mail server.') }}</small>
            </div>
            <div class="w-full p-2">
                <x-label name="username"  for="username" :value=" __('Username') " />

                    <input id="username" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" ms-auto" type="text" wire:model="username"
                        placeholder="themeluxury@gmail.com">
                    <small class="text-red-500">{{ __('The username to login to your mail server.') }}</small>
            </div>
            <div class="w-full p-2">
                <x-label name="password"  for="password" :value=" __('Password') " />

                    <input id="password" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" ms-auto" type="password" wire:model="password"
                        placeholder="your password">
                    <small class="text-red-500">{{ __('The password to login to your mail server.') }}</small>
            </div>
            <div class="w-full p-2">
                <x-label for="encryption" name="encryption"  :value=" __('Encryption') " />
                    <input id="encryption" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" ms-auto" type="text" wire:model="encryption"
                        placeholder="tls">
                    <small class="text-red-500">{{ __('For most servers') }} <code>SSL</code> or <code>TLS</code>
                        {{ __(' is the recommended option.') }}</small>
            </div>

        </div>

        <div class="form-group my-5">
            <button
                class="btn rounded-md mb-4 md:text-sm sm:text-xs font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300 float-end">
                <span>
                    <div wire:loading wire:target="onUpdateSMTP">
                        <x-loading />
                    </div>
                    <span>{{ __('Save Changes') }}</span>
                </span>
            </button>
        </div>
    </form>
</div>