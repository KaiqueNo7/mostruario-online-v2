<div>
    <div class="w-full flex flex-col lg:flex-row md:flex-row justify-between items-center p-3 mt-3">
        <div class="w-full lg:w-1/4 md:w-1/4 sm:lg:w-2/4 pb-0">
            <x-search />
        </div>
        <div class="flex justify-end items-center my-4 md:my-0 lg:my-0"><p class="dark:text-white">Total de categorias:</p> <span class="flex justify-center items-center text-white bg-green-500 p-4 w-4 h-4 rounded-full ml-2">{{ $count }}</span></div>
    
        
    </div>

    <div class="w-full px-4">
        @if($selectedCategory) 
            <button type="button" wire:click='deleteSelected' wire:confirm='Você tem certeza? Todos os produtos da categoria serão deletados.' class="bg-red-500 text-white font-normal py-1 px-2 rounded" >Deletar</button> 
        @else
            <button type="button" wire:click='deleteSelected' wire:confirm='Você tem certeza? Todos os produtos da categoria serão deletados.' disabled class="bg-red-500 text-white font-normal py-1 px-2 rounded opacity-50 cursor-not-allowed">Deletar</button>
        @endif
    </div>

    <div class="grid gap-4 grid-cols-auto md:grid-cols-3 sm:grid-cols-2 grid-rows-none p-4 h-full">
        @foreach($categories as $category)
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 p-2 flex justify-between items-center shadow rounded" wire:key='{{ $category->id }}'>
                <div wire:loading.remove wire:target.except='selectedCategory'>
                    <p class="text-slate-950 dark:text-white">{{ $category->name }}</p>
                    <p class="text-slate-950 dark:text-white italic text-sm">Total de produtos: {{ $category->products()->count() }}</p>
                </div>

                <div class="animate-pulse" wire:loading wire:target.except='selectedCategory'> 
                    <div class="w-20 h-5 bg-gray-200 p-2 rounded mb-2"></div>
                    <div class="w-36 h-4 bg-gray-200 p-2 rounded"></div>
                </div>
                
                <div>
                    <button type="submit" wire:click="edit('{{ $category->id }}')" class="bg-white dark:bg-slate-600 px-3 py-2 rounded text-green-500 hover:text-green-700 transition ease-in-out duration-150 shadow">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button type="button" wire:click="delete('{{ $category->id }}')" wire:confirm="Tem certeza que deseja deletar a categoria?" class="bg-white dark:bg-slate-600 px-3 py-2 rounded text-red-500 hover:text-red-700 transition ease-in-out duration-150 shadow">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <input type="checkbox" wire:model.live='selectedCategory' value="{{ $category->id }}" />
                </div>
            </div>
        @endforeach 
        
    </div>
    <div class="p-3 flex justify-start items-center">
        {{ $categories->links() }}
    </div>
</div>