<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mostruário Online </title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
            <x-alert />
            <div class="w-full p-3 text-center bg-green-400">
                <p class="text-base text-white font-medium">Mostruário Online - {{ $user }} </p>
            </div>
            <div class="grid gap-4 grid-cols-4 grid-rows-none p-3 h-full">
            @if(!empty($category))
                @foreach($category as $category)
                        <div class="w-full shadow-sm rounded-md overflow-hidden h-auto bg-white dark:bg-slate-800">
                            <div class="w-full h-72 relative">
                                @if ($category->image)
                                    <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $category->image) }}" alt="Imagem da Notícia"> 
                                @endif       
                            </div>
            
                            <div class="h-auto text-center font-medium transition ease-in duration-150 cursor-pointer rounded-md bg-slate-100 p-2 dark:bg-gray-800 dark:border-gray-700">
                                <a href="{{ asset('mo/kaique-nocetti/' . $category->id)  }}"><p class="text-slate-950 text-base">{{ $category->name }}</p></a>
                            </div>
                        </div>
                    @endforeach
            @endif
            @if(!empty($products))
                @foreach($products as $products)
                        <div class="w-full shadow-sm rounded-md overflow-hidden h-96 bg-white dark:bg-slate-800">
                            <div class="w-full h-72 relative">
                                @if ($products->image)
                                    <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem da Notícia"> 
                                @endif       
                            </div>
            
                            <div class="h-auto text-center font-medium transition ease-in duration-150 cursor-pointer rounded-md bg-slate-100 p-2 dark:bg-gray-800 dark:border-gray-700">
                                <p class="text-slate-950 text-base"><a href="{{ asset('mo/kaique-nocetti/' .$products->id)  }}">{{ $products->name }}</a></p>
                            </div>
                        </div>
                    @endforeach
            @endif
            </div>
    
    </body>
</html>
