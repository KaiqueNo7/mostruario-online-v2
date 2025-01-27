<x-guest-layout>
    <x-slot:title>
        Seja bem vindo
    </x-slot>

    <x-slot:subtitle>
        Acesse o seu {{ env('APP_TITLE') }}
    </x-slot>

    <x-slot:img>
        <img class="object-cover min-h-screen rounded-l-3xl" src="{{ asset('storage/assets/login.jpg') }}" alt="Imagem da tela de login">
    </x-slot>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
