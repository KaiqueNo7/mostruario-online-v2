<div>
    @if($openModalConfirm === true)
        <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto shadow opacity-100 visible">
            <p class="w-full text-lg text-center">{{ $message }}</p>
            <div class="flex justify-center items-center w-full gap-2">
                <button type="button" wire:click="{{ $destroy }}('{{ $idCategory }}')" class="inline-flex items-center px-4 py-2 mt-2 justify-center drop-shadow-xl bg-green-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white hover:text-green-600 dark:text-gray-800 uppercase hover:bg-white transition ease-in-out duration-300">Deletar</button>
                <button type="button" wire:click='closeModal' class="inline-flex items-center px-4 py-2 mt-2 justify-center drop-shadow-xl bg-gray-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white hover:text-gray-600 dark:text-gray-800 uppercase hover:bg-white transition ease-in-out duration-300">Cancelar</button>
            </div>
        </div>
    @else
        <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto shadow opacity-0 invisible">
            
        </div>
    @endif
</div>
