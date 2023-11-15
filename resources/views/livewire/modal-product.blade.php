<div>
    @if($showModal === true)
    <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto">    
        <button class="absolute right-3 top-2" wire:click='closeModal'><i class="fa-solid fa-xmark"></i></button>
        <form class="flex flex-col" wire:submit.prevent="{{ $formAction }}">  
            @csrf

            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Produto:</label>
            <input type="text" wire:model="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror
            
            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Descrição:</label>
            <input type="text" wire:model="description" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('description') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror

            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Categoria:</label>
            <select wire:model="id_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Selecione a categoria</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
            @error('id_category') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror

            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input" >Selecione uma imagem</label>
            <input id="file_input" type="file" wire:model="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            @error('image') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror

            <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 justify-center drop-shadow-xl bg-green-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white hover:text-green-600 dark:text-gray-800 uppercase tracking-widest hover:bg-white dark:hover:bg-white focus:text-white focus:bg-green-600 dark:focus:bg-white active:bg-green-400 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ $action }}</button>
        </form>
    </div>
    @endif
</div>
