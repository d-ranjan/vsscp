@props(['active'])

@php
$classes = ($active ?? false)
            ? 'mx-3 my-1 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 dark:text-white'
            : 'ml-3 my-1 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 dark:text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
