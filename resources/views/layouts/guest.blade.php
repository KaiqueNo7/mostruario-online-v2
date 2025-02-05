<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Crie seu {{ config('app.name', 'Mostruário Online'); }} de joias de forma totalmente gratuita. Potencialize suas vendas e facilite a consulta e gestão das informações do seu mostruário com simplicidade e eficiência. Acompanhe o valor do ouro em tempo real.">
        <title>{{ config('app.name', 'Mostruário Online'); }} - Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="w-full min-h-screen flex justify-between items-center">
            <div class="w-full sm:w-3/5 min-h-screen flex flex-col sm:justify-around items-center p-6 sm:pt-0 bg-white dark:bg-gray-900">
                <div class="w-full p-4">
                    <a href="/" class="text-center">
                        <x-application-logo class="w-20 h-20 fill-current" />
                    </a>

                    <h2 class="font-custom text-center text-3xl text-black dark:text-white font-bold pt-4">{{ $title }}</h2>
                    <p class="font-custom text-center text-lg text-green-400 font-semibold">{{ $subtitle }}</p>
                </div>
    
                <div class="w-full px-6 py-4 dark:bg-gray-800">
                    {{ $slot }}
                </div>
                <p><a href="{{ route('terms-and-services') }}"><small>Termos e serviços</small></a> | <a href="{{ route('privacy-policy') }}"><small>Política de privacidade</small></a></p>
            </div>
            <div class="w-2/5 hidden sm:block">
                {{ $img }}
            </div>
        </div>
    </body>
</html>
