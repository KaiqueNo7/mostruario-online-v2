<div>    
    <div class="relative grid gap-4 grid-cols-auto md:grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 grid-rows-none p-3 mt-3 h-full">
        <div class="fixed bottom-5 right-5 z-50">
            <x-dropdown align="bottom" width="48">
                <x-slot name="trigger">
                    <div class="p-2 w-12 h-12 bg-slate-100 transition ease-in text-lg rounded-lg flex justify-center items-center hover:bg-slate-200 cursor-pointer shadow-xl">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-nav>
                        <x-search></x-search>
                    </x-dropdown-nav>
                    <x-dropdown-nav>
                        {{ __('Selecione a categoria:') }} 
                    </x-dropdown-nav>
                    @foreach ($categories as $category)
                    <x-dropdown-nav wire:click="filterCategory('{{ $category->id }}')" :active="$idCategory == $category->id">
                        {{ $category->name }}
                    </x-dropdown-nav>
                    @endforeach
                    <x-dropdown-nav>
                        {{ __('Ordenar por:') }} 
                    </x-dropdown-nav>
                    <x-dropdown-nav wire:click="OrderByCategory('desc')" :active="$orderBy == 'desc'">
                        {{ __('Mais recente') }}
                    </x-dropdown-nav>
                    <x-dropdown-nav wire:click="OrderByCategory('asc')" :active="$orderBy == 'asc'">
                        {{ __('Menos recente') }}
                    </x-dropdown-nav>
                </x-slot>
            </x-dropdown>
        </div>

        @foreach($products as $products)
            <div class="w-full overflow-hidden h-auto bg-white shadow rounded">
                @if($modal == $products->id)
                   <x-modal :show='true'>
                    <div class="w-full h-96 relative">
                        @if ($products->image)
                            <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem do Produto"> 
                        @endif       
                    </div> 
                   </x-modal>
                @endif

                <div wire:click='openModal({{ $products->id }})' class="w-full h-96 relative">
                    @if ($products->image)
                        <img class="absolute h-full w-full object-cover" src="{{ asset('storage/' . $products->image) }}" alt="Imagem do Produto"> 
                    @endif       
                </div>

                <div class="h-auto bg-white p-2 ">
                    <p class="text-slate-950">{{ $products->name }} - {{ $products->category->name }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div id="endPage" x-data="{
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
