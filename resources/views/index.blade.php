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
            <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

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
                            <a class="nav-link page-scroll" href="#facil-pratico">Fácil e pratico</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#mantenha-se-atualizado">Matenha-se atualizado</a>
                        </li>
                        <li>
                            <a class="nav-link page-scroll" href="#dashboard">Dashboard</a>
                        </li>
                    </ul>
                </div>

                <a href="#" class="py-2 px-6 rounded-full bg-green-500 text-white">Login</a>
            </div> 
        </nav>
        
        <header class="header pt-28 text-center md:pt-36 lg:text-left xl:pt-20">
            <div class="container px-4 flex justify-center items-center flex-col xl:pb-20">
                <div class="mb-6 lg:mt-28 xl:mt-32 text-center">
                    <h1 class="h1-large mb-5">Crie seu mostruário online</h1>
                    <p class="p-large mb-8">Uma maneira simples, pratica e segura de apresentar suas jóias.</p>
                    <a class="btn-solid-lg" href="#your-link">Crie uma conta agora</a>
                </div>
                <div class="xl:text-right">
                    <img class="inline" src="{{ asset('storage/assets/header-smartphone.png') }}" alt="alternative" />
                </div>
            </div>

            <div id="mostruario" class="pt-16 pb-10 lg:pt-20">
                <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
                    <div class="lg:col-span-5">
                        <div class="mb-16 lg:mb-0 xl:mt-16">
                            <h2 class="mb-6 text-4xl font-semibold">Mostruário</h2>

                            <p class="mb-4 flex items-center">
                                Tenha uma apresentação impecável das suas jóias, com filtros intuitivos e um link personalizado que exibe seu nome para que seus clientes possam acessar facilmente.
                            </p>

                            <p class="mb-4 flex items-center">
                                Armazene todas as imagens das suas jóias conosco, economizando espaço em seus dispositivos e garantindo segurança.
                            </p>

                            <p class="mb-4 flex items-center">
                                Amplie o alcance das suas jóias, apresentando-as para um número maior de clientes e, assim, impulsione suas vendas de maneira eficaz.
                            </p>
                        </div>
                    </div>
                    <div class="lg:col-span-7">
                        <div class="xl:ml-14">
                            <img class="inline" src="{{ asset('storage/assets/details-1.png') }}" alt="alternative" />
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="py-24" id="facil-pratico">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-12 lg:gap-x-12">
                <div class="lg:col-span-7">
                    <div class="mb-12 lg:mb-0 xl:mr-14">
                        <img class="inline" src="{{ asset('storage/assets/details-2.png') }}" alt="alternative" />
                    </div>
                </div>
                <div class="lg:col-span-5">
                    <div class="xl:mt-12">
                        <h2 class="text-4xl mb-6">Fácil e pratico</h2>
                        <ul class="list mb-7 space-y-2">
                            <li class="flex">
                                <i class="fas fa-chevron-right"></i>
                                <div>Features that will help you and your marketers</div>
                            </li>
                            <li class="flex">
                                <i class="fas fa-chevron-right"></i>
                                <div>Smooth learning curve due to the knowledge base</div>
                            </li>
                            <li class="flex">
                                <i class="fas fa-chevron-right"></i>
                                <div>Ready out-of-the-box with minor setup settings</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg popup-with-move-anim mr-1.5" href="#details-lightbox">Lightbox</a>
                        <a class="btn-outline-reg" href="article.html">Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="mantenha-se-atualizado" class="basic-5">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2">  
                <div class="lg:mt-24 xl:mt-44 xl:ml-12">
                    <h2 class="text-4xl mb-6">Mantenha-se atualizado</h2>
                    <p class="mb-9 text-gray-800 text-3xl leading-10">Crie uma conta agora mesmo!</p>
                    <a class="btn-solid-lg" href="#your-link">Registrar-se</a>
                </div>

                <div class="mb-16 lg:mb-0">
                    <img src="{{ asset('storage/assets/conclusion-smartphone.png') }}" alt="alternative" />
                </div>
            </div>
        </div>

        <div id="dashboard" class="basic-5">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-2">  
                <div class="mb-16 lg:mb-0">
                    <img src="{{ asset('storage/assets/conclusion-smartphone.png') }}" alt="alternative" />
                </div>

                <div class="lg:mt-24 xl:mt-44 xl:ml-12">
                    <h2 class="text-4xl mb-6">Dashboard</h2>
                    <p class="mb-9 text-gray-800 text-3xl leading-10">Crie uma conta agora mesmo!</p>
                    <a class="btn-solid-lg" href="#your-link">Registrar-se</a>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container px-4 sm:px-8">
                <h4 class="mb-8 lg:max-w-3xl lg:mx-auto">Pavo is a mobile application for marketing automation and you can reach the team at <a class="text-indigo-600 hover:text-gray-500" href="mailto:email@domain.com">email@domain.com</a></h4>
            </div>
        </div>

        <div class="copyright">
            <div class="container px-4 sm:px-8 lg:grid lg:grid-cols-3 flex-col">
                <ul class="mb-4 list-unstyled p-small">
                    <li class="mb-2"><a href="terms.html">Termos e condições</a></li>
                    <li class="mb-2"><a href="privacy.html">Política de privacidade</a></li>
                </ul>
                <p class="pb-2 p-small statement">Copyright © <a href="#your-link" class="no-underline">Mostruário Online</a></p>
            </div> 
        </div> 

        <script src="{{ asset('storage/js/jquery.min.js') }}"></script> <!-- jQuery for JavaScript plugins -->
        <script src="{{ asset('storage/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src="{{ asset('storage/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
        <script src="{{ asset('storage/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
        <script src="{{ asset('storage/js/scripts.js') }}"></script> <!-- Custom scripts -->
    </body>
</html>