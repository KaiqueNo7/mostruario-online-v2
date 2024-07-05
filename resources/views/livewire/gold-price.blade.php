<div class="fixed left-5 bottom-5 z-50 flex justify-start items-start flex-col">
    <div class="inline-flex items-center mb-4 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-yellow-500 ring-1 ring-inset ring-green-600/20 gap-2">
        <p class="text-sm">Preço do ouro:</p>
        <p class="text-sm font-bold text-yellow-500">{{ $data->price_gold ?? 0, 2 }}</p>

        @if($data->price_gold_change > 0)
            <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $data->price_gold_change ?? 0 }}</p>
        @else
            <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $data->price_gold_change ?? 0 }}</p>
        @endif
    </div>

    <div class="inline-flex items-center mb-4 rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-gray-500 ring-1 ring-inset ring-green-600/20 gap-2">
        <p class="text-sm">Preço da prata:</p>
        <p class="text-sm font-bold text-gray-500">{{ $data->price_silver ?? 0, 2 }}</p>
        @if($data->price_silver_change > 0)
            <p class="text-xs text-red-500 leading-tight"><i class="fa-solid fa-arrow-trend-up"></i> {{ $data->price_silver_change ?? 0 }}</p>
        @else
            <p class="text-xs text-green-500 leading-tight"><i class="fa-solid fa-arrow-trend-down"></i> {{ $data->price_silver_change ?? 0 }}</p>
        @endif
    </div>
    <p class="text-xs text-slate-500 leading-tight">Última atualização {{ $data->created_at }}</p>
</div>
