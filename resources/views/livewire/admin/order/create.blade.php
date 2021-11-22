<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" class="pt-3">

        <div class="w-full p-2">
            <x-label for="orde.code" :value="__('Order code')" required />
            <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"  @error('order.code') border-red-600 @enderror" type="text" name="order-code"
                id="order_code" required wire:model="order.code">
            <x-input-error for="order.code" />
        </div>

        <div class="flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="vendor_id" :value="__('Vendors')" required />
                <select
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    required id="order-vendor_id" name="order-vendor_id" wire:change="vendorChange($event.target.value)"
                    wire:model.defer="order.vendor_id">
                    <option>-- {{ __('Choose Vendor') }} --</option>
                    @foreach ($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="vendor_id" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="order-subscription_id" :value="__('Order Subscription')" required />
                <select
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    required id="order-subscription_id" name="order-subscription_id" wire:model="selectedSubscriptionId">
                    <option>-- {{ __('Choose route') }} --</option>
                    @foreach ($subscriptions as $subscription)
                        <option value="{{ $subscription['id'] }}">{{ $subscription['name'] }} - {{ $subscription['pivot']['price'] }}
                        </option>
                    @endforeach
                </select>

                <x-input-error for="order.subscription_id" />
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="order-description" :value="__('Order Desription')" />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-description" id="order_description" wire:model="order.description">
                <x-input-error for="order.description" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('order.amount') ? 'is-invalid' : '' }}">
                <x-label for="order-order-amount" :value="__('Price')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="order-amount" id="order_amount" required wire:model.debounce.500ms="amount">
                <x-input-error for="order.amount" />
            </div>

            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="order-price" :value="__('Total')" required />
                <input class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="number" name="order-price" id="order_price" wire:model="order.price" readonly>
            </div>
        </div>

        <div class="flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.receiver_name') ? 'is-invalid' : '' }}">
                <x-label for="order-receiver_name" :value="__('Receiver name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-receiver_name" id="order_receiver_name" required
                    wire:model="order.receiver_name">
                <x-input-error for="order.receiver_name" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2 {{ $errors->has('order.receiver_phone') ? 'is-invalid' : '' }}">
                <x-label for="order-receiver_phone" :value="__('Receiver phone')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                    type="text" name="order-receiver-phone" id="order_receiver_phone" required
                    wire:model="order.receiver_phone">
                <x-input-error for="order.receiver_phone" />
            </div>
        </div>
        <div class="w-full p-2 {{ $errors->has('order.receiver_address') ? 'is-invalid' : '' }}">
            <x-label for="order-receiver_address" :value="__('Receiver address')" required />
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-purple-500"
                type="text" name="order-receiver_address" id="order_receiver_address" required
                wire:model="order.receiver_address">
            <x-input-error for="order.receiver_address" />
        </div>

        <div class="float-right p-2 mb-4">
            <button wire:click="submit"  type="submit"
                class="btn mr-2 rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-purple-600 text-white hover:text-purple-800 hover:bg-purple-100 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Save') }}
            </button>
    
            <a href="{{ route('admin.orders.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-purple-800 hover:bg-purple-200 active:bg-purple-200 focus:ring-purple-300">
                {{ __('Go Back') }}
            </a>
        </div>
    </form>
</div>
