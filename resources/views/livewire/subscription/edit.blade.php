<div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="mb-4 {{ $errors->has('subscription.name') ? 'is-invalid' : '' }}">
            <x-label required for="subscription_name" :value=" __('Subscription Name')" />
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" 
            type="text" name="subscription_name" id="subscription_name" required
                wire:model.defer="subscription.name">
            <x-input-error for="subscription.name" />
        </div>

        <div class="mb-4 {{ $errors->has('subscription.details') ? 'is-invalid' : '' }}">
            <x-label required for="subscription_details" :value=" __('Subscription details')" />
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" type="text" name="subscription_details" id="subscription_details" required
                wire:model.defer="subscription.details">
            <x-input-error for="subscription.details" />
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ subscription('admin.subscriptions.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
