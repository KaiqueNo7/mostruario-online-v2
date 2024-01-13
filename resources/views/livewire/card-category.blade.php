<div>
    <div class="w-full flex justify-between items-center p-3 mt-3">
        <div class="lg:w-1/4 sm:lg:w-2/4 pb-0"><x-search /></div>
        <div class="flex justify-end items-center">Total de categorias: <span class="flex justify-center items-center text-white bg-green-500 p-4 w-4 h-4 rounded-full ml-2">{{ $count }}</span></div>
    </div>
    <div class="grid gap-4 grid-cols-2 md:grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 grid-rows-none p-4 h-full">
        @foreach($categories as $category)
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 p-2 flex justify-between items-center shadow rounded">
                <div>
                    <p class="text-slate-950">{{ $category->name }}</p>
                    <p class="text-slate-950 italic text-sm"> 
                    @if($category->presentation == 1)
                        Preço
                    @endif
                    @if($category->presentation == 2)
                        Preço parcelado
                    @endif
                    @if($category->presentation == 3)
                        Peso
                    @endif
                    @if($category->presentation == 4)
                        Nenhum
                    @endif
                    </p>
                </div>
                
                <div>
                    <button type="submit" wire:click="edit('{{ $category->id }}')" class="bg-white px-3 py-2 rounded text-green-500 hover:text-green-700 transition ease-in-out duration-150 shadow"><i class="fa-regular fa-pen-to-square"></i></button>
                    <button type="button" wire:click="confirm('{{ $category->id }}')" class="bg-white px-3 py-2 rounded text-red-500 hover:text-red-700 transition ease-in-out duration-150 shadow"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
        @endforeach
    </div>
</div>