<div>
    <div class="w-full lg:w-1/4 sm:lg:w-2/4 p-3 pb-0 mt-3">
        <x-search />
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