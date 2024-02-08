<div>    
    <div class="relative grid gap-4 grid-cols-auto md:grid-cols-4 sm:grid-cols-2 lg:grid-cols-4 grid-rows-none p-3 mt-3 h-full">
        <div class="fixed top-20 right-5 z-50">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <div class="p-2 w-11 h-11 bg-slate-200 transition ease-in text-lg rounded-lg flex justify-center items-center hover:bg-slate-300 cursor-pointer">
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
                    <x-dropdown-nav wire:click="OrderByCategory('asc')" :active="$orderBy == 'asc'">
                        {{ __('Mais recente') }}
                    </x-dropdown-nav>
                    <x-dropdown-nav wire:click="OrderByCategory('desc')" :active="$orderBy == 'desc'">
                        {{ __('Menos recente') }}
                    </x-dropdown-nav>
                </x-slot>
            </x-dropdown>
        </div>

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
