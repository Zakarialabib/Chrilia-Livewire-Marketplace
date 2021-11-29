<div>
    <a class="inline-flex items-center p-2 disabled:cursor-not-allowed focus:outline-none focus:ring focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-dark-eval-2 bg-white text-gray-500 hover:bg-gray-100 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 dark:hover:bg-dark-eval-2 dark:hover:text-gray-200 rounded-md"
        onclick="openDropdown(event,'nav-notifications-dropdown')">
        <x-heroicon-o-bell class="w-6 h-6" aria-hidden="true" />
        @if ($new_alert_count = auth()->user()->notifications->where('read_at', null)->count())
            <span
                class="absolute -top-1 right-1 text-xs font-semibold inline-flex rounded-full h-5 min-w-5 text-white bg-indigo-600 leading-5 justify-center">
                <span class="px-1">{{ $new_alert_count }}</span>
            </span>
        @endif
    </a>
    <div id="nav-notifications-dropdown" data-popper-placement="bottom-start"
        class="bg-white text-gray-500 focus:ring-blue-500 dark:text-gray-400 dark:bg-dark-eval-1 transition-colors z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48 hidden"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(617px, 58px);">
        @foreach ($notifications as $key => $notification)
            @if ($notification->read_at != true)
                <button wire:click="toggleReadStatus({{ $key }})">
                    <span
                        class="flex flex-wrap py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap {{ $notification->read_at === null ? __('font-bold') : __('') }}">
                        <x-heroicon-o-trash class="text-green-500 h-4 w-4" />
                        {{ $notification->data['message'] }}
                    </span>
                </button>
            @endif
        @endforeach
        <a href="{{ route('admin.notifications') }}"
            class="flex flex-wrap py-2 px-4 text-sm dark:hover:bg-gray-600 dark:hover:text-gray-200 w-full whitespace-nowrap">
            <x-heroicon-o-bell class="text-red-500 h-4 w-4" />{{ __('Notification Center') }}
        </a>
    </div>
</div>
