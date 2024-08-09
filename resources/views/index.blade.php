<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="Crie seu mostruário online de joias de forma totalmente gratuita. Potencialize suas vendas e facilite a consulta e gestão das informações do seu mostruário com simplicidade e eficiência. Acompanhe o valor do ouro em tempo real." />
        <meta name="author" content="Kaique Nocetti" />

        <title>Mostruário Online</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="{{ asset('storage/css/style.css') }}" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body data-spy="scroll" data-target=".fixed-top">
        <nav id="header" class="fixed-top">
            <div class="container px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

                <a class="inline-block mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="index.html">
                    <img src="{{ asset('storage/assets/logo.png') }}" alt="alternative" class="h-20" />
                </a>

                <button class="background-transparent rounded text-xl leading-none hover:no-underline focus:no-underline lg:hidden lg:text-gray-400" type="button" data-toggle="offcanvas">
                    <span class="navbar-toggler-icon inline-block w-8 h-8 align-middle"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse lg:flex lg:items-center" id="navbarsExampleDefault">
                    <ul class="mt-3 mb-2 flex flex-col list-none lg:flex-row">
                        <li>
                            <a class="nav-link page-scroll" href="#mostruario">Mostruário</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#facil-pratico">Fácil e prático</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#mantenha-se-atualizado">Matenha-se atualizado</a>
                        </li>
                    </ul>
                </div>

                <a href="{{ route('login') }}" class="py-2 px-6 rounded-full bg-green-500 text-white border border-green-500 hover:bg-white hover:text-green-500 transition-all hidden md:block">Login</a>
            </div> 
        </nav>
        
        <header class="bg-radial-green pt-28 text-center md:pt-36 lg:text-left xl:pt-20">
            <div class="container px-4 flex justify-center items-center flex-col xl:pb-20">
                <div class="mb-6 lg:mt-28 xl:mt-32 text-center">
                    <h1 class="text-3xl md:text-6xl mb-5">Crie seu mostruário <span class="animate-pulse text-green-500">online</span></h1>
                    <p class="p-large mb-8">Uma maneira simples, prática e segura de apresentar suas jóias.</p>
                    <a class="btn-solid-lg" href="{{ route('register') }}">Crie uma conta agora</a>
                </div>
                <div class="xl:text-right">
                    <img class="inline" src="{{ asset('storage/assets/header-smartphone.png') }}" alt="alternative" />
                </div>
            </div>

            <div id="mostruario" class="pt-16 pb-10 lg:pt-20">
                <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12 items-center">
                    <div class="lg:col-span-5">
                        <div class="mb-16 lg:mb-0 xl:mt-16">
                            <h2 class="mb-6 text-4xl lg:text-6xl font-semibold">Mostruário</h2>

                            <p class="mb-4">
                                <b class="text-green-500">Tenha uma apresentação impecável das suas jóias</b>, com filtros intuitivos e um link personalizado que exibe seu nome para que seus clientes possam acessar facilmente.
                            </p>

                            <p class="mb-4">
                                <b class="text-green-500">Armazene todas as imagens das suas jóias conosco</b>, economizando espaço em seus dispositivos e garantindo segurança.
                            </p>

                            <p class="mb-4">
                                Amplie o alcance das suas jóias, apresentando-as para um número maior de clientes e, assim, <b class="text-green-500">impulsione suas vendas de maneira eficaz</b>.
                            </p>

                            <p class="mb-4">
                                Os valores das suas jóias <b class="text-green-500">só aparecem para você</b>, não para o cliente.
                            </p>
                        </div>
                    </div>
                    <div class="lg:col-span-7">
                        <div class="relative">
                            <img class="inline" src="{{ asset('storage/assets/mostruario.png') }}" alt="alternative" />
                            <div class="absolute right-5 top-5 bg-green-500 text-white px-4 py-2 rounded-md shadow-md">Link próprio</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="py-12 md:py-24" id="facil-pratico">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 lg:gap-x-12 flex flex-col-reverse md:flex-col items-center">
                <div class="lg:col-span-1 relative text-center">
                    <img class="inline" src="{{ asset('storage/assets/facil-pratico.png') }}" alt="facil-pratico" />
                    <div class="absolute right-5 bottom-24 bg-green-500 text-white px-4 py-2 rounded-md shadow-md">Múltiplas imagens de uma vez só</div>
                </div>
                <div class="lg:col-span-1">
                    <h2 class="text-4xl lg:text-6xl mb-6">Fácil e prático</h2>
                    <ul class="list mb-7 space-y-2">
                        <li class="flex items-center text-sm md:text-lg">
                            <i class="fa-solid fa-check text-green-500 mr-2"></i>
                            <div>Maneira fácil e simples de adicionar as jóias.</div>
                        </li>
                        <li class="flex items-center text-sm md:text-lg">
                            <i class="fa-solid fa-check text-green-500 mr-2"></i>
                            <div>Controle sobre o total jóias e categorias.</div>
                        </li>
                        <li class="flex items-center text-sm md:text-lg">
                            <i class="fa-solid fa-check text-green-500 mr-2"></i>
                            <div>Consiga adicionar várias jóias de uma só vez.</div>
                        </li>
                        <li class="flex items-center text-sm md:text-lg">
                            <i class="fa-solid fa-check text-green-500 mr-2"></i>
                            <div>Apresente suas jóais com só dois cliques.</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="mantenha-se-atualizado" class="mb-6 sm:mb-52">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2 items-center lg:mb-16">  
                <div class="">
                    <h2 class="text-4xl lg:text-6xl mb-6">Mantenha-se atualizado</h2>
                    <p class="mb-4 flex items-center">
                        <i class="fa-solid fa-check text-green-500 mr-2"></i>
                        Atualização todos os dias do valor do ouro.
                    </p>
                    <p class="mb-4 flex items-center">
                        <i class="fa-solid fa-check text-green-500 mr-2"></i>
                        Atualização todos os dias do valor da prata.
                    </p>
                    <p class="mb-4 flex items-center">
                        <i class="fa-solid fa-check text-green-500 mr-2"></i>
                        Atualização todos os dias do valor do dolar.
                    </p>
                    <p class="mb-4 flex items-center">
                        <i class="fa-solid fa-check text-green-500 mr-2"></i>
                        Receba preços sugeridos de acordo com o mercado.
                    </p>
                </div>

                <div class="relative">
                    <img class="inline" src="{{ asset('storage/assets/mantenha-se-atualizado.png') }}" alt="alternative" />
                    <div class="absolute left-5 top-3 bg-green-500 text-white px-4 py-2 rounded-md shadow-md">Dashboard completo</div>
                </div>
            </div>
        </div>

        <div class="container flex flex-col justify-center items-start px-4 sm:px-8 lg:px-16 py-6 lg:py-10 bg-green-500 rounded-lg text-left relative h-auto lg:h-60 shadow-lg w-72 sm:w-full">
            <h4 class="text-white font-normal text-4xl">Apresentar suas jóias nunca foi tão fácil</h4>
            <p class="text-white my-4">Crie uma conta grátis e comece agora mesmo um jeito novo de apresentar e gerenciar suas jóias.</p>
            <a href="{{ route('register') }}" class="py-2 px-6 rounded-full bg-white text-green-500 hover:bg-green-500 hover:text-white border border-white transition-all">Crie uma conta</a>

            <div class="absolute -top-24 right-20 hidden md:block">
                <img class="max-w-52" src="{{ asset('storage/assets/mobile-apresetation.png') }}" alt="Apresentação do sistema mobile.">
            </div>
        </div>

        <div class="copyright">
            <div class="container px-4 flex justify-center items-center flex-col">
                <p class="pb-2 p-small statement">© <a href="https://mostruario.online" class="no-underline">Mostruário Online</a></p>
                <ul class="my-4 list-unstyled p-small ">
                    <li class="mb-2 text-black hover:text-green-500 transition-all"><a href="{{ route('terms-and-services') }}">Termos e condições</a></li>
                    <li class="mb-2 text-black hover:text-green-500 transition-all"><a href="{{ route('privacy-policy') }}">Política de privacidade</a></li>
                </ul>
            </div> 
        </div> 
        
        <script src="{{ asset('storage/js/jquery.min.js') }}"></script> <!-- jQuery for JavaScript plugins -->
        <script src="{{ asset('storage/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="{{ asset('storage/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
        <script src="{{ asset('storage/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
        <script src="{{ asset('storage/js/scripts.js') }}"></script> <!-- Custom scripts -->
    </body>
</html>