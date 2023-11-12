<div> 
    @if($showModal === true)
    <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto">    
        <button class="absolute right-3 top-2" wire:click='closeModal'><i class="fa-solid fa-xmark"></i></button>
        <form class="flex flex-col" wire:submit.prevent="{{ $formAction }}">  
            @csrf
            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Categoria:</label>
            <input type="text" wire:model="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror
            
            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Descrição:</label>
            <input type="text" wire:model="description" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Apresentação:</label>
            <select wire:model="presentation" wire:change="showField" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Selecione</option>
                    <option value="1">Preço</option>
                    <option value="2">Preço parcelado</option>
                    <option value="3">Peso</option>
                    <option value="4">Nenhum</option>
            </select>
            @error('presentation') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror

            @if($fieldNumberInstallments === true || !empty($number_installments))
                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white">Número de parcelas:</label>
                <select wire:model="number_installments" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Selecione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                </select>
                @error('number_installments') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror
            @endif
                
            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input" >Selecione uma imagem</label>
            <input id="file_input" type="file" wire:model="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            @error('image') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror

            <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 justify-center drop-shadow-xl bg-green-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white hover:text-green-600 dark:text-gray-800 uppercase tracking-widest hover:bg-white dark:hover:bg-white focus:text-white focus:bg-green-600 dark:focus:bg-white active:bg-green-400 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ $action }}</button>
        </form>
    </div>
    @endif
</div>
