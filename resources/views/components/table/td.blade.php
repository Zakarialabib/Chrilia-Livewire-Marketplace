<td {{ $attributes->merge([
    'class' => 'p-2 md:border md:border-grey-500 text-left text-gray-700 dark:text-gray-300',
]) }}>
    {{ $slot }}
</td>