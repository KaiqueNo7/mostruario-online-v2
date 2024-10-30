<div>
    <div class="flex w-full justify-end items-center">
        <button class="flex justify-center items-center gap-2 py-1 px-2 bg-slate-200 rounded text-xs" wire:click='generatePriceIA()'>Usar IA <img class=" h-5 w-5" src="{{ asset('storage/assets/gemini-icon.png') }}" alt="logo-gemini" /></button>
    </div>
    <div class="w-full animate-pulse" wire:loading.delay.long> 
        <div class="w-full h-10 bg-gray-200 p-2 rounded mt-2"></div>
    </div>
    <div class="flex w-full justify-start my-2 items-center">
        <p class="text-xs">{!! $textResponse !!}</p>
        <p class="hidden text-xs">{!! $price !!}</p>
    </div>
</div>
