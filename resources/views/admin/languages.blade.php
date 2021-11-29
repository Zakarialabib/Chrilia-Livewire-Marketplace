@extends('layouts.dashboard-full')
@section('title', __('Translations'))
@section('content')

<div class="container bg-white">
    <div class="w-full p-10">
        <a class="w-full btn btn-danger mt-10 " href="{{ route('admin.dashboard') }}">
            {{ __('Dashboard') }}
        </a>
    </div>
    <form method="POST" action="{{ route('admin.translations.create') }}">
        @csrf
        <div class="flex flex-wrap -m-2 py-5">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <label>{{ __('Key') }}:</label>
                <input type="text" name="key" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" placeholder="Enter Key...">
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <label>{{ __('Value') }}:</label>
                <input type="text" name="value" class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500" placeholder="Enter Value...">
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <button type="submit" class="btn btn-success w-full mt-10">{{ __('Add') }}</button>
            </div>
        </div>
    </form>
    <table class="table table-hover table-bordered py-5">
        <thead>
        <tr>
            <th>{{ __('Key') }}</th>
            @if($languages->count() > 0)
                @foreach($languages as $language)

                    <th>{{ $language->name }}({{ $language->code }})</th>

                @endforeach
            @endif
            <th width="80px;">{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody>
            @if($columnsCount > 0)
                @foreach($columns[0] as $columnKey => $columnValue)
                    <tr>
                        <td><a href="#" class="translate-key" data-title="Enter Key" data-type="text" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json.key') }}">{{ $columnKey }}</a></td>
                        @for($i=1; $i<=$columnsCount; ++$i)
                        <td><a href="#" data-title="Enter Translate" class="translate" data-code="{{ $columns[$i]['lang'] }}" data-type="textarea" data-pk="{{ $columnKey }}" data-url="{{ route('admin.translation.update.json') }}">{{ isset($columns[$i]['data'][$columnKey]) ? $columns[$i]['data'][$columnKey] : '' }}</a></td>
                        @endfor
                        <td><button type="button" data-action="{{ route('admin.translations.destroy', $columnKey) }}" class="btn btn-danger btn-xs remove-key">{{ __('Delete') }}</button></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $('.translate').editable({

        params: function(params) {

            params.code = $(this).editable().data('code');

            return params;

        }

    });


    $('.translate-key').editable({

        validate: function(value) {

            if($.trim(value) == '') {

                return 'Key is required';

            }

        }

    });


    $('body').on('click', '.remove-key', function(){

        var cObj = $(this);


        if (confirm("Are you sure want to remove this item?")) {

            $.ajax({

                url: cObj.data('action'),

                method: 'DELETE',

                success: function(data) {

                    cObj.parents("tr").remove();

                    alert("Your imaginary file has been deleted.");

                }

            });

        }


    });

</script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
@endpush