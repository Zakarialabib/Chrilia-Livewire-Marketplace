@php
$phone = \App\Models\Phone::where('phone_name', 'like', '%' . $this->phone_name . '%')->first();
@endphp
<div class="w-full items-center px-5 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex flex-wrap -mx-4 overflow-hidden sm:-mx-4 md:-mx-4 lg:-mx-4 xl:-mx-3">
        <div
            class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:py-7 sm:px-4 md:my-4 md:py-10 md:px-8 md:w-1/2 lg:my-4 lg:py-16 lg:px-16 lg:w-1/2 xl:my-3 xl:py-21 xl:px-16 xl:w-1/2">
            <h1 class="text-3xl leading-snug text-gray-800 dark:text-gray-200 md:text-4xl">
                Search by Imei
            </h1>
            <div class="flex items-center max-w-md mx-auto bg-white rounded-lg shadow-xl my-5">
                <div class="w-full">
                    <input wire:model.defer="search" type="text"
                        class="w-full flex-1 h-10 px-4 m-1 text-gray-700 placeholder-gray-400 bg-transparent border-none appearance-none lg:h-12 dark:text-gray-200 focus:outline-none focus:placeholder-transparent focus:ring-0"
                        placeholder="Search imei">
                </div>
                <div>
                    <button wire:click="render"
                        class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg">
                        <x-heroicon-o-search class="w-5 h-5" />
                    </button>
                </div>
            </div>
        </div>
        @if (strlen($search) >= 2)
            <div
                class="my-4 px-4 w-full overflow-hidden sm:my-4 sm:px-4 md:my-4 md:px-4 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/2 xl:my-3 xl:px-3 xl:w-1/2">
                @if ($searchResults->count() > 0)
                    <ul>
                        <li class="border-b border-gray-700">
                            <p >Your moble phone imei :  {{ $searchResults['imei'] }}</p>
                            <p > {{ $data['data']['title'] }}</p>
                        </li>
                    </ul>
                    <h2 class="font-extrabold text-lg">
                        Related devices
                    </h2>
                    <div class="flex flex-wrap -mx-2 overflow-hidden">
                        @foreach ($data['data']['phones'] as $item)
                            <div
                                class="my-2 px-2 w-1/2 overflow-hidden sm:w-1/2 md:w-1/2 lg:w-1/4 xl:w-1/4 mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
                                <a href="{{ route('phone.show', $item['slug']) }}">
                                    <img class="w-full" src="{{ $item['image'] }}" alt="" />
                                    <div class="desc p-4 text-gray-800">
                                        <span
                                            class="title font-bold block cursor-pointer hover:underline">{{ $item['phone_name'] }}
                                        </span>
                                        <span
                                            class="description text-sm block py-2 border-gray-400 mb-2">{{ $item['brand'] }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-3 py-3">No results for "{{ $search }}"</div>
                @endif
            </div>
        @endif
    </div>
</div>
