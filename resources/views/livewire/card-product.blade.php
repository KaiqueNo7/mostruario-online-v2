<div>
    <div class="flex flex-col justify-center lg:flex-row md:flex-row md:justify-between lg:justify-items-between items-center p-3 mt-3">
        <div class="w-full lg:w-1/5 lg:mr-4 md:mr-4">
            <x-search />
        </div>

        <div class="w-full lg:w-1/5 my-4 lg:mr-4 md:mr-4 lg:my-0">
            <livewire:select-category />
        </div> 

        <div class="w-full lg:w-1/5 my-4 lg:mr-4 md:mr-4 lg:my-0">
            <livewire:select-order />
        </div>

        <div class="w-full lg:w-1/5">
            <select wire:model='type' wire:change="selectType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-green-500 focus:border-green-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                <option>Selecione o tipo</option>
                @foreach ($types as $value => $type)
                    <option value="{{ $value }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>

        <div class="lg:w-1/5 flex justify-end items-center my-4 md:my-0 lg:my-0"><p class="dark:text-white">Total de produtos:</p> <span class="flex justify-center items-center text-white bg-green-500 p-4 w-4 h-4 rounded-full ml-2">{{ $count }}</span></div>
    </div>
    
    <div class="grid gap-4 grid-cols-auto md:grid-cols-3 sm:grid-cols-2 grid-rows-none p-3 h-full">
        @foreach($products as $product)
            <div class="w-full overflow-hidden h-auto bg-white dark:bg-slate-800 shadow rounded hover:shadow-lg transition-all" wire:key='{{ $product->id }}'>
                <div class="w-full h-72 relative">
                    @if ($product->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $product->image) }}" alt="Imagem do produto"> 
                    @endif       
                    <div class="absolute bottom-3 left-1 px-2 z-10">
                        <button type="button" wire:click="edit('{{ $product->id }}')" class="bg-white dark:bg-slate-600 text-green-400 px-3 py-2 rounded hover:text-green-500 transition ease-in-out duration-150 shadow "><i class="fa-regular fa-pen-to-square"></i></button>
                        <button type="button" wire:click="destroy('{{ $product->id }}')" wire:confirm="Tem certeza que deseja deletar à jóia?" class="bg-white dark:bg-slate-600 text-red-400 px-3 py-2 rounded hover:text-red-500 transition ease-in-out duration-150 shadow "><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>

                <div class="h-auto bg-white p-2 dark:text-white dark:bg-gray-800 dark:border-gray-700">
                    <div class="w-full animate-pulse" wire:loading.delay.long> 
                        <div class="w-12 h-5 bg-gray-200 p-2 rounded mb-2"></div>
                        <div class="w-40 h-5 bg-gray-200 p-2 rounded mb-4"></div>
                        <div class="w-36 h-5 bg-gray-200 p-2 rounded mb-4"></div>
                        <div class="w-12 h-5 bg-gray-200 p-2 rounded mb-2"></div>
                        <div class="w-16 h-5 bg-gray-200 p-2 rounded mb-2"></div>
                        <div class="w-32 h-5 bg-gray-200 p-2 rounded"></div>
                    </div>

                    <div wire:loading.remove.delay.long>
                        <p class="text-slate-700 text-sm dark:text-white"><b>Id:</b> {{ $product->id }}</p>
                        <p class="text-slate-700 text-sm dark:text-white mb-4"><b>Categoria:</b> {{ $product->category->name }}</p> 

                        <p class="text-slate-600 text-md mb-4">Características:</p>
                        <p class="text-stone-950 text-sm dark:text-white"><b>Peso:</b> {{ round($product->weight, 1) }}</p>
                        
                        @php 
                        switch ($product->type) {
                            case '1':
                                echo '<p class="text-yellow-600 font-normal text-sm dark:text-white"><b>Tipo:</b> Ouro</p>';
                                echo '<p class="text-green-600 font-normal text-sm dark:text-white"><b>Preço sugerido:</b> R$ ' . number_format((($prices->price_gold * $product->weight) * Auth::user()->multiplier ?? 2), 2, ',', '.') . '</p>';
                                break;
                            case '2':
                                echo '<p class="text-gray-600 font-normal text-sm dark:text-white"><b>Tipo:</b> Prata</p>';
                                echo '<p class="text-green-600 font-normal text-sm dark:text-white"><b>Preço sugerido:</b> R$ ' . number_format((($prices->price_silver * $product->weight) * Auth::user()->multiplier ?? 2), 2, ',', '.') . '</p>';
                                break;
                            default:
                                echo '<p class="text-slate-600 font-normal text-sm dark:text-white"><b>Nenhum definido</b>';
                                break;
                        }
                        @endphp
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div x-data="{
        infinityScroll(){
            const observer = new IntersectionObserver((items) => {
                items.forEach((item) => {
                    if(item.isIntersecting) {
                        @this.loadMore();
                    }
                })
            }, {
                threshold: 0.5,
                rootMargin: '150px'
            })

            observer.observe(this.$el)
        }
    }" x-init="infinityScroll()">
    </div>
</div>
