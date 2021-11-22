<tr {{ $attributes->merge([
    'class' => 'whitespace-nowrap text-sm text-gray-800',
]) }}>
    {{ $slot }}
</tr>