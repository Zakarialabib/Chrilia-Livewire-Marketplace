<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="flex flex-wrap -m-2">
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.code') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="title">{{ __('Code') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="order-code" id="order_code" required wire:model.defer="order.code">
                <div class="validation-message">
                    {{ $errors->first('order.code') }}
                </div>
            </div>

            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.subscription_id') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-route-id">{{ __('Order route') }}</label>
                <select class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" required id="order_subscription_id" name="order-route-id"
                    wire:model="selectedSubscriptionId">
                    <option value="{{ $order->subscription->id }}">{{ $order->subscription->name }} -
                        {{ $order->subscription->details }}</option>
                </select>
                <div class="validation-message">
                    {{ $errors->first('order.subscription_id') }}
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -m-2">
            <div class="my-2 p-2  w-1/3 {{ $errors->has('order.description') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order_description">{{ __('Product name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="order_description" id="order_description" required
                    wire:model.defer="order.description">
                <div class="validation-message">
                    {{ $errors->first('order.description') }}
                </div>
            </div>

            <div class="my-2 p-2 w-1/3 {{ $errors->has('order.receiver_phone') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-receiver-phone">{{ __('Receiver phone') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="order-receiver-phone" id="order_receiver_phone" required
                    wire:model.defer="order.receiver_phone">
                <div class="validation-message">
                    {{ $errors->first('order.receiver_phone') }}
                </div>
            </div>

            <div class="my-2 p-2 w-1/3 {{ $errors->has('order.receiver_name') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-receiver-name">{{ __('Receiver name') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="order-receiver-name" id="order_receiver_name" required
                    wire:model.defer="order.receiver_name">
                <div class="validation-message">
                    {{ $errors->first('order.receiver_name') }}
                </div>
            </div>
        </div>

        <div class="flex flex-wrap -m-2">
            <div class="w-4/5 p-2 {{ $errors->has('order.receiver_address') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-receiver-address">{{ __('Receiver address') }}</label>
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="order-receiver-address" id="order_receiver_address" required
                    wire:model.defer="order.receiver_address">
                <div class="validation-message">
                    {{ $errors->first('order.receiver_address') }}
                </div>
            </div>
            <div class="w-1/5 p-2 {{ $errors->has('order.') ? 'is-invalid' : '' }}">
                <label class="form-label required" for="order-price">{{ __('Price') }}</label>
                <input :value="old('order.amount')"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="order-price" id="order_price" required wire:model="order.price">
                <div class="validation-message">
                    {{ $errors->first('order.amount') }}
                </div>
            </div>
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
