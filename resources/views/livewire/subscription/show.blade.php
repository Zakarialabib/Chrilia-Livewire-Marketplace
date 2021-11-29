<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <div class="pt-3">
        <div class="card-header-container flex flex-wrap">
            <div class="inline-flex">
                <button
                    class="md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    type="button" wire:click.prevent="updateSubscriptions">
                    {{ __('Sync Subscriptions') }}
                </button>
            </div>
        </div>
        <table class="w-full rounded-t-lg m-5 mx-auto text-black">
            <thead>
                <tr class="text-left border-b bg-gray-100 border-gray-300">
                    <th class="px-4 py-3">
                        {{ __('Subscription name') }}
                    </th>
                    <th class="px-4 py-3">
                        {{ __('Subscription details') }}
                    </th>
                    <th class="px-4 py-3">
                        {{ __('Price') }}
                    </th>
                    <td>
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
                                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                                type="number" name="subscription-{{ $key }}-price"
                                id="subscription-{{ $key }}-price"
                                wire:model="subscriptions.{{ $key }}.pivot.price" min="0">
                        </td>
                        <td class="px-4 py-3">
                            <a class="text-red-500 bg-transparent border border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none ease-linear transition-all duration-150"
                                href="#"
                                wire:click.prevent="removeSubscription({{ $subscription['id'] }}, {{ $subscription['pivot']['user_id'] }})">
                                <x-heroicon-o-trash class="h-4 w-4" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
