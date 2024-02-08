<div> 
    @if($showModal === true)
        <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto shadow opacity-100 visible">
            <button class="absolute right-3 top-2" wire:click='closeModal'><i class="fa-solid fa-xmark"></i></button>
            <form class="flex flex-col" wire:submit.prevent="{{ $formAction }}">  
                @csrf
                <label class="block my-2 text-sm font-medium text-gray-900">Categoria:</label>
                <input type="text" name="name" wire:model="name" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-sm bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('name') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror
                
                <button type="submit" class="inline-flex items-center px-4 py-2 mt-2 justify-center drop-shadow-xl bg-green-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white hover:text-green-600 dark:text-gray-800 uppercase tracking-widest hover:bg-white dark:hover:bg-white focus:text-white focus:bg-green-600 dark:focus:bg-white active:bg-green-400 active:text-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">{{ $action }}</button>
            </form>
        </div>
    @else
        <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto shadow opacity-0 invisible">
            
        </div>
    @endif
</div>
