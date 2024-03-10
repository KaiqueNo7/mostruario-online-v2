<x-guest-layout>

    <x-slot:title>
        Seja bem vindo
    </x-slot>

    <x-slot:subtitle>
        Acesse o seu mostruário online
    </x-slot>

    <x-slot:img>
        <img class="object-cover min-h-screen rounded-l-3xl" src="{{ asset('storage/assets/login.jpg') }}" alt="Imagem da tela de login">
    </x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Lembrar-me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>
            @endif

            <x-login-button class="ml-3">
                {{ __('Entrar') }}
            </x-login-button>
        </div>
    </form>

    <a href="{{ route('login.google') }}" class="px-4 py-2 my-4 border flex justify-center items-center gap-2 border-slate-200 dark:border-slate-700 rounded-lg text-slate-700 dark:text-slate-200 hover:border-slate-400 dark:hover:border-slate-500 hover:text-slate-900 dark:hover:text-slate-300 hover:shadow transition duration-150">
        <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy" alt="google logo">
        <span>Login com o Google</span>
    </a>


    <div class="flex justify-center items-center mt-5 gap-1 text-sm">
        <p class="dark:text-white">Não tem conta ainda?</p>
        <a href="{{ route('register') }}" class="text-green-400 underline font-normal hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">Registrar-se</a>
    </div>
</x-guest-layout>
