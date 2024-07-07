<div>
    <div class="fixed bottom-24 right-8 flex items-center justify-center flex-col {{ $zIndex }}">
        <input type="hidden" value="{{ asset('/mo/' .str_replace(' ', '-', strtolower(Auth::user()->name)) ) }}" id="linkInput">
    
        <div class="group relative flex justify-center {{ $opacity }} {{ $scale }} transition duration-300 ease-out rounded-full my-1">
            <span id="copiedMessage" class="absolute pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300 rounded-xl shadow-md">Copiar link</span>
            <button onclick="copyToClipboard();" class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300"><i class="fa-regular fa-copy"></i></button>
        </div>
        
        @if($categories > 0)
            <div class="group relative flex justify-center {{ $opacity }} {{ $scale }} transition duration-300 ease-out rounded-full my-1">
                <span class="absolute pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300 rounded-xl shadow-md">Adicionar Jóia</span>
                <button wire:click="showModalVariousProducts" class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300"><i class="fa-solid fa-ring"></i></button>
            </div>
        @endif

        <div class="group relative flex justify-center {{ $opacity }} {{ $scale }} transition duration-300 ease-out rounded-full my-1">
            <span class="absolute pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300 rounded-xl shadow-md">Adicionar categoria</span>
            <button wire:click="showModalCategory" class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300"><i class="fa-solid fa-tags"></i></button>
        </div>
    </div>
    <div class="fixed bottom-5 right-5">
        <button class="w-16 h-16 mt-2 z-40 text-4xl transition ease-int-out duration-300 flex items-center justify-center shadow-md bg-green-500 hover:bg-white text-white hover:text-green-500 rounded-full {{ $rotateClass }}" wire:click="moreOptions"><i class="fa-solid fa-plus"></i></button>
    </div>
</div>