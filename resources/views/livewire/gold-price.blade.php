<div class="w-full h-40 shadow-md rounded-xl p-4 bg-white dark:bg-slate-600 relative">
    <h2 class="text-lg mb-2 text-slate-500 leading-tight">Tabela de preços</h2>
    <div class="w-full flex justify-between items-center mb-2">
        <p class="text-sm">OURO</p>

        <div class='flex flex-col items-end justify-center'>
            <p class="text-sm font-bold text-black">R$ {{ $data->price_gold ?? 0, 2 }}</p>
            @if($data->price_gold_change > 0)
            <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $data->price_gold_change ?? 0 }}</p>
            @else
            <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $data->price_gold_change ?? 0 }}</p>
            @endif
        </div>
    </div>

    <div class="w-full flex justify-between items-center mb-2">
        <p class="text-sm">PRATA</p>

        <div class='flex flex-col items-end justify-center'>
            <p class="text-sm font-bold text-black">R$ {{ $data->price_silver ?? 0, 2 }}</p>
            @if($data->price_silver_change > 0)
                <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $data->price_silver_change ?? 0 }}</p>
            @else
                <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $data->price_silver_change ?? 0 }}</p>
            @endif
        </div>
    </div>
    
    <p class="text-xs text-slate-500 leading-tight">Última atualização {{ $data->created_at }}</p>
</div>
