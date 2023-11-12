<x-app-layout>
    <div class="flex justify-start gap-3 p-3 h-full">
        <div class="w-1/3 h-40 shadow-md rounded-xl p-6 flex items-center justify-between bg-white">
            <h1 class="text-2xl"><i class="fa-solid fa-tags"></i> Categorias</h1>
            <p class="text-3xl font-bold text-emerald-500">{{ $categories }}</p>
        </div>

        <div class="w-1/3 h-40 shadow-md rounded-xl p-6 flex items-center justify-between bg-white">
            <h1 class="text-2xl"><i class="fa-solid fa-box-open"></i> Produtos</h1>
            <p class="text-3xl font-bold text-emerald-500">{{ $products }}</p>
        </div>      
    </div>
</x-app-layout>
