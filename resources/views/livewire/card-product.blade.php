<div>
    <div class="flex justify-items-between items-center p-3 mt-3">
        <div class="w-1/3 mr-4">
            <x-search />
        </div>

        <div class="w-1/3 mr-4">
            <livewire:select-category />
        </div> 

        <div class="w-1/3">
            <livewire:select-order />
        </div>
    </div>
    
    <div class="grid gap-4 grid-cols-4 grid-rows-none p-3 h-full">
        @foreach($products as $products)
            <div class="w-full overflow-hidden h-96 bg-white dark:bg-slate-800 shadow rounded-sm">
                <div class="w-full h-72 relative">
                    @if ($products->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem da Notícia"> 
                    @endif       
                    <div class="absolute bottom-3 right-1 px-2 z-10">
                        <button type="submit" wire:click="edit('{{ $products->id }}')" class="bg-white text-black px-3 py-2 rounded-sm hover:text-green-500 transition ease-in-out duration-150"><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="submit" wire:click="destroy('{{ $products->id }}')" class="bg-white text-black px-3 py-2 rounded-sm hover:text-red-500 transition ease-in-out duration-150"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>

                <div class="h-28 bg-white p-2 dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-slate-950">{{ $products->name }}</p>
                    <p class="text-slate-950">{{ $products->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if($seeMoreCount)
        <x-button-see-more />
    @endif
</div>
