@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-green-500 rounded-lg bg-green-100 group hover:bg-green-200 transition-all hover:text-green-500'
            : 'flex items-center p-2 text-gray-900 rounded-lg group hover:bg-green-200 transition-all hover:text-green-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
