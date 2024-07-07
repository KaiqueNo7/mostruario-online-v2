<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mostruário Online</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Poppins:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        
    </head>
    <body class="font-sans antialiased">
         @include('layouts.sidebar')

        <div class="sm:ml-64">
            <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
                @include('layouts.navigation')

                @if (isset($header))
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="relative h-full">
                    {{ $slot }}
                </main>

                <livewire:modal-category />
                <livewire:modal-product />
                <livewire:modal-various-products />
                <livewire:button-principal />
                <livewire:gold-price>                 
            </div>
        </div>
    <script>
    function copyToClipboard() {
        const textoParaCopiar = document.getElementById('linkInput').value;
    
        copiarTexto(textoParaCopiar);
    
        document.getElementById('copiedMessage').innerText = 'Copiado';
    
        setTimeout(function() {
            document.getElementById('copiedMessage').innerText = 'Copiar link';
        }, 3000);
    };
    
    function copiarTexto(texto) {
        const elementoTemp = document.createElement('textarea');
        elementoTemp.value = texto;
        document.body.appendChild(elementoTemp);
        elementoTemp.select();
        document.execCommand('copy');
        document.body.removeChild(elementoTemp);
    }
    </script>    
    </body>
</html>
