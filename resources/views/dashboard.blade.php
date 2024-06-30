<x-app-layout>
    <div class="grid grid-cols-1 sm:grid-cols-3 grid-flow-row gap-4 p-4">
        <a href="{{ route('view.category') }}">
            <div class="w-full h-32 shadow-md rounded-xl p-4 bg-white dark:bg-slate-600 relative">
                <h1 class="text-xl font-normal dark:text-white">Total de categorias</h1>
                <p class="text-3xl font-bold text-emerald-500 mb-2">{{ $categories }}</p>

                @if($categoriesDifference > 0)
                    <p class="text-xs text-green-500 leading-tight">{{ $categoriesDifference }} Categorias a mais que ontem <i class="fa-solid fa-arrow-trend-up"></i></p>
                @else
                    <p class="text-xs text-slate-500 leading-tight">Nenhuma atualização</p>
                @endif 

                <div class="flex justify-center items-center absolute top-5 right-5 w-10 h-10 bg-green-400 rounded-xl">
                    <i class="fa-solid fa-tags text-green-800"></i>
                </div>
            </div>
        </a>

        <a href="{{ route('view.products') }}">
            <div class="w-full h-32 shadow-md rounded-xl p-4 bg-white dark:bg-slate-600 relative">
                <h1 class="text-xl font-normal dark:text-white">Total de produtos</h1>
                <p class="text-3xl font-bold text-orange-500 mb-2">{{ $products }}</p>

                @if($productDifference > 0)
                    <p class="text-xs text-green-500 leading-tight">{{ $productDifference }}Produtos a mais que ontem <i class="fa-solid fa-arrow-trend-up"></i></p>
                @else
                    <p class="text-xs text-slate-500 leading-tight">Nenhuma atualização</p>
                @endif 

                <div class="flex justify-center items-center absolute top-5 right-5 w-10 h-10 bg-orange-400 rounded-xl">
                    <i class="fa-solid fa-box-open text-orange-800"></i>
                </div>
            </div>
        </a>

        <div class="w-full h-32 shadow-md rounded-xl p-4 bg-white dark:bg-slate-600 relative">
            <h1 class="text-xl font-normal dark:text-white">Total de visualizações</h1>
            <p class="text-3xl font-bold text-blue-500 mb-2">{{ $views }}</p>

            @if($viewsDifference > 0)
                <p class="text-xs text-green-500 leading-tight">{{ $viewsDifference }}Visualizações a mais que ontem <i class="fa-solid fa-arrow-trend-up"></i></p>
            @elseif($viewsDifference < 0)
                <p class="text-xs text-red-500 leading-tight">{{ $viewsDifference }}Visualizações a menos que ontem <i class="fa-solid fa-arrow-trend-down"></i></p>
            @else
                <p class="text-xs text-slate-500 leading-tight">Nenhuma atualização</p>
            @endif 

            <div class="flex justify-center items-center absolute top-5 right-5 w-10 h-10 bg-blue-400 rounded-xl">
                <i class="fa-solid fa-chart-line text-blue-800"></i>
            </div>
        </div>  
    </div>
</x-app-layout>
