<x-app-layout>
    <div class="flex justify-start gap-3 p-3 h-full flex-col lg:flex-row md:flex-row">
        <div class="w-full lg:w-1/3 md:w-1/2 h-40 shadow-md rounded-xl p-6 flex items-center justify-between bg-white dark:bg-slate-600">
            <a href="{{ route('view.category') }}"><h1 class="text-2xl dark:text-white"><i class="fa-solid fa-tags"></i> Categorias</h1></a>
            <div class="flex items-center gap-1">
                <p class="text-3xl font-bold text-emerald-500">{{ $categories }}</p>
                @if($categoriesDifference > 0)
                    <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $categoriesDifference }}</p>
                @if($categoriesDifference < 0)
                    <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $categoriesDifference }}</p>
                @endif 
            </div>
        </div>
        
        <div class="w-full lg:w-1/3 md:w-1/2 h-40 shadow-md rounded-xl p-6 flex items-center justify-between bg-white dark:bg-slate-600">
            <a href="{{ route('view.products') }}"><h1 class="text-2xl dark:text-white"><i class="fa-solid fa-box-open"></i> Produtos</h1></a>
            <div class="flex items-center gap-1">
                <p class="text-3xl font-bold text-emerald-500">{{ $products }}</p>
                @if($productDifference > 0)
                    <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $productDifference }}</p>
                @elseif($productDifference < 0)
                    <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $productDifference }}</p>
                @endif           
            </div>
        </div>   
        
        <div class="w-full lg:w-1/3 md:w-1/2 h-40 shadow-md rounded-xl p-6 flex items-center justify-between bg-white dark:bg-slate-600">
            <h1 class="text-2xl dark:text-white"><i class="fa-solid fa-eye"></i> Visualizações</h1>
            <div class="flex items-center gap-1">
                <p class="text-3xl font-bold text-emerald-500">{{ $views }}</p>
                @if($viewsDifference > 0)
                    <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $viewsDifference }}</p>
                @elseif($viewsDifference < 0)
                    <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $viewsDifference }}</p>
                @endif
            </div>
        </div>    
    </div>
</x-app-layout>
