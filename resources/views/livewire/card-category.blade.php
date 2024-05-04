<div>
    <div class="w-full flex flex-col lg:flex-row md:flex-row justify-between items-center p-3 mt-3">
        <div class="w-full lg:w-1/4 md:w-1/4 sm:lg:w-2/4 pb-0">
            <x-search />
        </div>
        <div class="flex justify-end items-center my-4 md:my-0 lg:my-0"><p class="dark:text-white">Total de categorias:</p> <span class="flex justify-center items-center text-white bg-green-500 p-4 w-4 h-4 rounded-full ml-2">{{ $count }}</span></div>
    </div>

    <div class="grid gap-4 grid-cols-auto md:grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 grid-rows-none p-4 h-full">
        @foreach($categories as $category)
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 p-2 flex justify-between items-center shadow rounded">
                <div>
                    <p class="text-slate-950 dark:text-white">{{ $category->name }}</p>
                    <p class="text-slate-950 dark:text-white italic text-sm">Total de produtos: {{ $category->products()->count() }}</p>
                </div>
                
                <div>
                    <button type="submit" wire:click="edit('{{ $category->id }}')" class="bg-white dark:bg-slate-600 px-3 py-2 rounded text-green-500 hover:text-green-700 transition ease-in-out duration-150 shadow">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                    <button type="button" wire:click="delete('{{ $category->id }}')" wire:confirm="Tem certeza que deseja deletar a categoria?" class="bg-white dark:bg-slate-600 px-3 py-2 rounded text-red-500 hover:text-red-700 transition ease-in-out duration-150 shadow">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach 
        
    </div>
    <div class="p-3 flex justify-start items-center">
        {{ $categories->links() }}
    </div>
</div>