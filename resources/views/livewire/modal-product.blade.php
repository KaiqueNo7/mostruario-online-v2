<div>
<x-modal :show="$show">
    <x-input-close />
    <form class="flex flex-col" wire:submit.prevent="{{ $formAction }}" enctype="multipart/form-data">  
        @csrf

        <x-input-label>Nome da Jóia:</x-input-label>
        <x-text-input type="text" name="name" wire:model="name" />
        @error('name') <x-input-error :messages="$message"></x-input-error> @enderror

        <x-input-label>Categoria:</x-input-label>
        <select wire:model="id_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Selecione a categoria</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
        </select>

        <x-input-label>Tipo:</x-input-label>
        <select wire:model="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Selecione o tipo</option>
                @foreach ($types as $value => $type)
                    <option value="{{ $value }}">{{ $type }}</option>
                @endforeach
        </select>

        @error('id_category') <x-input-error :messages="$message"></x-input-error> @enderror

        <x-input-label>Peso:</x-input-label>
        <x-text-input wire:model='weight' type="number" min="0.1" max="1000" step="0.1" placeholder="0.0" />
        @error('weight') <x-input-error :messages="$message"></x-input-error> @enderror

        <x-input-label for="file_input">Selecione uma imagem</x-input-label>
        <div class="flex items-center justify-start w-full h-full">
            <label for="fileInput" class="relative cursor-pointer bg-gray-200 text-black px-4 py-1 rounded-lg shadow hover:bg-white hover:text-green-400 transition ease-in-out duration-150">
                Escolher arquivo <i class="fa-regular fa-image pl-2"></i>
                <input id="fileInput" wire:model="image" type="file" class="hidden" accept="image/*"/>
            </label>
        </div>
        @if($image)
            <img src="{{ $image->temporaryUrl() }}" alt="Preview da Imagem" class="w-16 h-16 border rounded-lg my-2" style="object-fit: cover;">
        @endif

        @if($imageCurrent && $image == false)
            <img src="{{ asset('storage/' . $imageCurrent) }}" alt="Preview da Imagem" class="w-16 h-16 border rounded-lg my-2" style="object-fit: cover;">
        @endif
        @error('image') <x-input-error :messages="$message"></x-input-error> @enderror

        <x-primary-button wire:model='input_submit' wire:loading.attr="disabled">
            <span wire:loading.remove wire:target='image'>
                {{ $action }}
            </span>
            <span wire:loading wire:target='image'>
                <x-loading />
            </span>
        </x-primary-button>
    </form>
</x-modal>
</div>
