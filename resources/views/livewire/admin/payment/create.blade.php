<div>
     <!-- Validation Errors -->
     <x-auth-validation-errors class="mb-4" :errors="$errors" />
     
    <form wire:submit.prevent="submit" class="pt-3">
        <div class="flex flex-wrap">
            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="method" :value="__('Payment Method')" />
                <select wire:model.defer="method" id="method"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 ">
                    <option value="">{{ __('Choose a method') }}</option>
                    <option value="0">{{ __('Bank Transfer') }}</option>
                    <option value="1">{{ __('Cash') }}</option>
                </select>
                <x-input-error for="method" />
            </div>

            <div class="lg:w-1/2 sm:w-full p-2">
                <x-label for="amount_received" :value="__('Amount Received')" required />
                <input wire:model.defer="amount_received" type="number" name="amount_received"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500">
                <x-input-error for="amount_received" />
            </div>
        </div>
        <div class="w-full p-2">
            <x-label for="payment_vendor_id" :value="__('Client')" required />
            <div wire:ignore wire:key="client">
                <select wire:change="clientChange($event.target.value)" wire:model.defer="vendor_id"
                    id="payment_vendor_id" name="payment-vendor_id"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500 @error('vendor_id') is-invalid @enderror"
                    required>
                    <option value="">{{ __('Choose Client') }}</option>
                    @foreach ($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <x-input-error for="vendor_id" />


            @if ($orders->count())
                <div class="my-5">
                    <h3 class="text-dark font-weight-bold mb-5">{{ __('Choose Order') }}</h3>
                    <div class="mb-4 m-0">
                        <div class="flex flex-wrap" wire:loading.remove wire:target="clientChange">
                            @foreach ($orders as $order)
                                <div class="w-1/2 py-2 px-3 my-2 border border-gray-300 bg-white rounded-md shadow-sm">
                                    <label class="">
                                        <span class="option-control">
                                            <span class="radio">
                                                <input class="ml-2" wire:click="orderChange" wire:model.defer="order_id" type="radio"
                                                    name="order_id" value="{{ $order->id }}" />
                                            </span>
                                        </span>
                                        <span class="">
                                                {{ $order->client->name }} - {{ $order->price }} {{ config('settings.currency_symbol') }} - 
                                                @if ($order->status == \App\Models\Order::STATUS_PENDING)
                                                <span class="badge text-white bg-green-500">{{ __('Pending') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_PROCESSING)
                                                    <span class="badge bg-blue-500 text-white">{{ __('Processing') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_COLLECTING)
                                                    <span class="badge text-white bg-red-500">{{ __('Collecting') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_CONFIRMED)
                                                    <span class="badge bg-blue-300 text-black ">{{ __('Confirmed') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_SHIPPING)
                                                    <span class="badge tbg-orange-500 text-white">{{ __('Shipping') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_CANCELED)
                                                    <span class="badge text-white bg-red-500">{{ __('Canceled') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_COMPLETED)
                                                    <span class="badge bg-green-700 text-white ">{{ __('Completed') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_RETURNED)
                                                    <span class="badge bg-red-700 text-white">{{ __('Returned') }}</span>
                                                @elseif($order->status == \App\Models\Order::STATUS_PAID)
                                                    <span class="badge bg-blue-700 text-white">{{ __('PAID') }}</span>
                                                @endif
                                        </span>
                                        
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="p-2"><span class="text-red-600 text-xs">{{ __('Choose Client') }}</span></div>
            @endif
        </div>

        <div class="float-right p-2 mb-4">
            <button
                class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                wire:click.prevent="submit()" type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{route('admin.payments.index')}}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
