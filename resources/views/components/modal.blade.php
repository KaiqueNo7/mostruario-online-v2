@props(['show' => false])

@if($show === true)
    <div
        class="fixed inset-0 transform transition-all z-50"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div wire:click='closeModal' class="absolute inset-0 bg-gray-500 opacity-75"></div>
        <div class="fixed w-full max-w-sm max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-md transform -translate-x-1/2 -translate-y-1/2 bg-white overflow-auto shadow opacity-100 visible">
            {{ $slot }}
        </div>
    </div>
    
@else
    <div class="fixed w-full max-w-md max-h-full top-1/2 left-1/2 p-4 transition-opacity z-10 duration-300 ease-out rounded-sm transform -translate-x-1/2 -translate-y-1/2 bg-white dark:bg-slate-400 overflow-auto shadow opacity-0 invisible">
        
    </div>
@endif