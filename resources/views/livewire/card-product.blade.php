<div>
    <div class="flex flex-col justify-center lg:flex-row md:flex-row md:justify-between lg:justify-items-between items-center p-3 mt-3">
        <div class="w-full lg:w-1/4 lg:mr-4 md:mr-4">
            <x-search />
        </div>

        <div class="w-full lg:w-1/4 my-4 lg:mr-4 md:mr-4 lg:my-0">
            <livewire:select-category />
        </div> 

        <div class="w-full lg:w-1/4">
            <livewire:select-order />
        </div>

        <div class="lg:w-1/4 flex justify-end items-center">Total de produtos: <span class="flex justify-center items-center text-white bg-green-500 p-4 w-4 h-4 rounded-full ml-2">{{ $count }}</span></div>
    </div>
    
    <div class="grid gap-4 grid-cols-auto md:grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 grid-rows-none p-3 h-full">
        @foreach($products as $products)
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 shadow rounded hover:shadow-lg transition-all">
                <div class="w-full h-72 relative">
                    @if ($products->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem da Notícia"> 
                    @endif       
                    <div class="absolute bottom-3 left-1 px-2 z-10">
                        <button type="submit" wire:click="edit('{{ $products->id }}')" class="bg-white text-green-400 px-3 py-2 rounded hover:text-green-500 transition ease-in-out duration-150 shadow "><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="submit" wire:click="confirm('{{ $products->id }}')" class="bg-white text-red-400 px-3 py-2 rounded hover:text-red-500 transition ease-in-out duration-150 shadow "><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>

                <div class="h-auto bg-white p-2 dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-slate-950">{{ $products->name }}</p>
                    <p class="text-slate-950 italic">{{ $products->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    @if($seeMoreCount)
        <x-button-see-more />
    @endif
</div>
