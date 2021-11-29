<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap my-4">
        <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.code') ? 'is-invalid' : '' }}">
            <label class="form-label required" for="title">{{ __('Order code') }}</label>
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="text" name="order-code" id="order_code" required
                wire:model.defer="order.code">
            <x-input-error for="order.code" />
        </div>

        <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.subscription_id') ? 'is-invalid' : '' }}">
            <label class="form-label required" for="order_subscription_id">{{ __('Order subscription') }}</label>
            <select class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" required id="order_subscription_id" name="order_subscription_id"
                wire:model="selectedSubscriptionId">
                <option>-- {{__('Choose Subscription')}} --</option>
                @foreach ($subscriptions as $subscription)
                    <option value="{{ $subscription['id'] }}">{{ $subscription['name'] }} - {{ $subscription['pivot']['price'] }}</option>
                @endforeach
            </select>
            <x-input-error for="order.subscription_id" />
        </div>
        </div>
        <div class="flex flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('order.product_name') ? 'invalid' : '' }}">
                <label class="form-label required" for="order-product_name">{{ __('Product name') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="text" name="order-product_name" id="order_product_name" required
                    wire:model.defer="order.product_name">
                    <x-input-error for="order.product_name" />
            </div>
    
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('order.') ? 'invalid' : '' }}">
                <label class="form-label required" for="order-amount">{{ __('Price') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="number" name="order-amount" id="order_amount" required
                    wire:model.debounce.500ms="amount">
                <x-input-error for="order.amount" />
            </div>
    
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <label class="form-label required" for="order-price">{{ __('Total') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="number" name="order-price" id="order_price" wire:model="order.price"
                    readonly>
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.receiver_name') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-receiver-name">{{ __('Receiver name') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="text" name="order-receiver-name" id="order_receiver_name" required
                    wire:model.defer="order.receiver_name">
                <x-input-error for="order.receiver_name" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.receiver_phone') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-receiver-phone">{{ __('Receiver phone') }}</label>
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="text" name="order-receiver-phone" id="order_receiver_phone" required
                    wire:model.defer="order.receiver_phone">
                <x-input-error for="order.receiver_phone" />
            </div>
        </div>

        <div class="mb-4 p-2  {{ $errors->has('order.receiver_address') ? 'is-invalid' : '' }}">
            <label class="form-label required" for="order-receiver-address">{{ __('Receiver address') }}</label>
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" type="text" name="order-receiver-address" id="order_receiver_address" required
                wire:model.defer="order.receiver_address">
            <x-input-error for="order.receiver_address" />
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('vendor.orders.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
