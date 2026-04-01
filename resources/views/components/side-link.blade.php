@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-green-500 rounded-lg bg-green-100 dark:bg-green-900/30 group hover:bg-green-200 dark:hover:bg-green-900/50 transition-all hover:text-green-500'
            : 'flex items-center p-2 text-gray-900 dark:text-gray-200 rounded-lg group hover:bg-green-200 dark:hover:bg-green-900/50 transition-all hover:text-green-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
