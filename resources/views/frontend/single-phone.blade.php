@extends('layouts.web')
@section('content')
    <section class="hero">
        <div class="flex justify-center items-center w-full bg-white">
            <div class="pt-16 grid grid-cols-2 gap-8">
                <div class="flex flex-col justify-start">
                    <div class="flex flex-col w-full object-cover justify-items-start rounded-lg overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ $phone->image }}">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex flex-col gap-4">
                        <h2 class="text-4xl font-semibold leading-6 text-gray-800 capitalize">{{ $phone->phone_name }}</h2>
                        <p class="">{{ $phone->brand }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col items-center px-5 py-8 mx-auto  max-w-7xl sm:px-6 lg:px-8">
            <div class="mx-auto text-left">
                <div class="flex flex-wrap -mx-2 overflow-hidden sm:-mx-2 md:-mx-3 lg:-mx-2 xl:-mx-2">
                    <table class="table table-view w-full">
                        @foreach ($data['data']['specifications'] as $item)
                            <thead>
                                <tr>
                                    <th>
                                        {{ $item['title'] }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($item['specs'] as $key => $specs)
                                        <td>
                                            {{ $specs['key'] }}
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    @foreach ($item['specs'] as $key => $specs)
                                        <td>
                                            {{ $specs['val'][0] }}
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="p-4">
                    <div class="pt-3">
                        {{-- {{ $data['data']->links() }} --}}
                    </div>
                </div>
            </div>
    </section>
@endsection
