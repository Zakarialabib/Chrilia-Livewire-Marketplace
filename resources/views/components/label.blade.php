@props([
    'value',
    'for',
    'required' => false
])

@php
    $attributes = $attributes->class([
        'my-3 block font-medium text-sm text-gray-700 dark:text-gray-300',
    ])->merge([
        //
    ]);
@endphp

@if ($required)
    <label for="{{ $for }}" {{ $attributes }}>
        {{ $value ?? $slot }}<i class="text-red-600 text-sm">*</i>
    </label>
@elseif($value || !$slot->isEmpty())
    <label for="{{ $for }}" {{ $attributes }}>
        {{ $value ?? $slot }}
    </label>
@endif