<div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="p-2">
            <div class="mb-4 {{ $errors->has('subscription.name') ? 'is-invalid' : '' }}">
                <x-label required for="subscription_name" :value=" __('Subscription name')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="subscription_name" id="subscription_name" required wire:model.defer="subscription.name">
                <x-input-error for="subscription.name" />
            </div>

            <div class="mb-4 {{ $errors->has('subscription.details') ? 'is-invalid' : '' }}">
                <x-label required for="subscription_details" :value=" __('Subscription details')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="subscription_details" id="subscription_details" required wire:model.defer="subscription.details">
                <x-input-error for="subscription.details" />
            </div>

        </div>
        <div class="float-right p-2 mb-4">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ subscription('admin.subscriptions.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
