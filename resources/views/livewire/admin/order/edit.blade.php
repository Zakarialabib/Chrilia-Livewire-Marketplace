<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="flex flex-wrap -m-2">

            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.code') ? 'is-invalid' : '' }}">
                <x-label for="orde.code" :value="__('Order code')" required />
                <input type="text" name="order-code" id="order_code" required wire:model.defer="order.code"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500">
                <x-input-error for="order.code" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.subscription_id') ? 'is-invalid' : '' }}">
                <x-label for="order-subscription_id" :value="__('Order route')" required />
                <select class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" required id="order_subscription_id" name="order-route-id"
                    wire:model="selectedSubscriptionId">
                    <option value="{{ $order->subscription->id }}">{{ $order->subscription->name }} -
                        {{ $order->subscription->details }}
                    </option>
                </select>
                <x-input-error for="order.subscription_id" />
            </div>
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.status') ? 'is-invalid' : '' }}">
                <x-label for="order-status" :value="__('Status')" required />
                <select class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500" required id="order_status" name="order-status" wire:model="order.status">
                    <option value="{{ $order->id }}">
                        @if ($order->status == \App\Models\Order::STATUS_PENDING)
                            {{ __('Pending') }}
                        @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                            {{ __('Processing') }}
                        @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                            {{ __('Collecting') }}
                        @elseif($order->status == \App\Models\Order::STATUS_CONFIRMED)
                            {{ __('Confirmed') }}
                        @elseif($order->status == \App\Models\Order::STATUS_SHIPPING)
                            {{ __('Shipping') }}
                        @elseif($order->status == \App\Models\Order::STATUS_CANCELED)
                            {{ __('Canceled') }}
                        @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                            {{ __('Completed') }}
                        @elseif($order->status == \App\Models\Order::STATUS_RETURNED)
                            {{ __('Returned') }}
                        @elseif($order->status == \App\Models\Order::STATUS_PAID)
                            {{ __('PAID') }}
                        @endif
                    </option>
                </select>
                <x-input-error for="order.status" />
            </div>
        </div>

        <div class="flex flex-wrap -m-2">

            <div class="my-2 p-2 w-1/2 {{ $errors->has('order.receiver_phone') ? 'is-invalid' : '' }}">
                <x-label for="order-receiver_phone" :value="__('Receiver phone')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-receiver-phone" id="order_receiver_phone" required
                    wire:model.defer="order.receiver_phone">
                <x-input-error for="order.receiver_phone" />
            </div>

            <div class="my-2 p-2 w-1/2 {{ $errors->has('order.receiver_name') ? 'is-invalid' : '' }}">
                <x-label for="order-receiver_name" :value="__('Receiver name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-receiver-name" id="order_receiver_name" required
                    wire:model.defer="order.receiver_name">
                <x-input-error for="order.receiver_name" />
            </div>
            <div class="w-full p-2 {{ $errors->has('order.receiver_address') ? 'is-invalid' : '' }}">
                <x-label for="order-receiver_address" :value="__('Receiver address')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-receiver-address" id="order_receiver_address" required
                    wire:model.defer="order.receiver_address">
                <x-input-error for="order.receiver_address" />
            </div>
        </div>

        <div class="flex flex-wrap -m-2">

            <div class="my-2 p-2  w-1/2 {{ $errors->has('order.product_name') ? 'is-invalid' : '' }}">
                <x-label for="order-product_name" :value="__('Order Desription')" />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-product_name" id="order_product_name" required
                    wire:model.defer="order.product_name">
                <x-input-error for="order.product_name" />
            </div>

            <div class="my-2 p-2  w-1/2 {{ $errors->has('order.amount') ? 'is-invalid' : '' }}">
                <x-label for="order-order-amount" :value="__('Price')" required />
                <input :value="old('order.amount')"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="order-price" id="order_price" required wire:model="order.price">
                <x-input-error for="order.amount" />
            </div>
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('admin.orders.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Cancel') }}
            </a>
        </div>
    </form>
</div>
