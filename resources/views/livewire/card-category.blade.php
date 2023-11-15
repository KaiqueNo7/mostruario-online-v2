<div>
    <div class="w-1/4 p-3 pb-0">
        <x-search />
    </div>
    <div class="grid gap-4 grid-cols-4 grid-rows-none p-4 h-full">
        @foreach($categories as $category)
            <div class="w-full overflow-hidden h-96 bg-white dark:bg-slate-800">
                <div class="w-full h-72 relative">
                    @if ($category->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $category->image) }}" alt="Imagem da Notícia"> 
                    @endif       
                    <div class="absolute bottom-3 right-1 px-2 z-10">
                        <button type="submit" wire:click="edit('{{ $category->id }}')" class="bg-white text-black px-3 py-2 rounded-sm hover:text-green-500 transition ease-in-out duration-150"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="button" wire:click="destroy('{{ $category->id }}')" class="bg-white text-black px-3 py-2 rounded-sm hover:text-red-500 transition ease-in-out duration-150"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>

                <div class="h-28 bg-white p-2 dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-slate-950">{{ $category->name }}</p>
                    <p class="text-slate-950">{{ $category->description }}</p>
                    <p class="text-slate-950">{{ $category->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if($seeMoreCount)
        <x-button-see-more />
    @endif
</div>