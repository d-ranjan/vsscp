@props(['pic'])

<img {{ $attributes->merge(['class' => 'w-10 h-10 mx-auto rounded-full border-2 border-grey-600']) }} src="{{ asset($pic) }}">