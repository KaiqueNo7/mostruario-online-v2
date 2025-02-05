<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Mostruário Online'); }} - {{ $user->name }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Poppins:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <x-alert />
        <div class="flex justify-between items-center w-full py-1 px-4 text-center bg-white shadow-lg">
            <p class="text-black text-lg font-medium">{{ $user->name }}</p>
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </div>
    
        <livewire:apresentation-products id="{{ $user->id }}" lazy/>

        <div class="fixed bottom-5 left-5 z-50">
            <a href="https://wa.me/55{{ $id->phone ?? "" }}?text=Amei%20suas%20joias!" target="_blank" class="flex justify-center items-center h-7 w-7 bg-white rounded-md text-2xl text-green-600 font-bold"><i class="fa-brands fa-square-whatsapp text-4xl"></i></a>
        </div>
    </body>
</html>
