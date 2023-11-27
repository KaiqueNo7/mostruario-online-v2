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
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 shadow rounded">
                <div class="w-full h-72 relative">
                    @if ($products->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem da Notícia"> 
                    @endif       
                </div>

                <div class="h-auto bg-white p-2 dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-slate-950">{{ $products->name }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
