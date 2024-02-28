@props(['active'])

@php

$classes = ($active ?? false)
            ? 'block w-full dark:text-white px-4 py-2 text-left text-sm leading-5 text-white hover:bg-green-500 bg-green-400 transition duration-150 ease-in-out'
            : 'block w-full dark:text-white px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-green-100 transition duration-150 ease-in-out';
@endphp


<div {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</div>
