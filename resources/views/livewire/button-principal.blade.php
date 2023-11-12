<div>
    <div class="fixed bottom-5 right-5 z-50 flex items-center justify-center flex-col">
        <input type="hidden" value="{{ asset('/mo/' .str_replace(' ', '-', Auth::user()->name) ) }}" id="linkInput">
            <div class="group relative flex justify-center @if($more === true) opacity-1 scale-100 @else opacity-0 scale-0 @endif transition duration-300 ease-out rounded-full my-1">
                <span class="absolute opacity-0 group-hover:opacity-100 pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300" id="copiedMessage">Copiar link</span>
                <button class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300" onclick="copyToClipboard();"><i class="fa-regular fa-copy"></i></button>
            </div>

            <div class="group relative flex justify-center @if($more === true) opacity-1 scale-100 @else opacity-0 scale-0 @endif transition duration-300 ease-out rounded-full my-1">
                <span class="absolute opacity-0 group-hover:opacity-100 pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300">Adicionar produto</span>
                <button class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300" wire:click="showModalProduct"><i class="fa-solid fa-box-open"></i></button>
            </div>

            <div class="group relative flex justify-center @if($more === true) opacity-1 scale-100 @else opacity-0 scale-0 @endif transition duration-300 ease-out rounded-full my-1">
                <span class="absolute opacity-0 group-hover:opacity-100 pointer-events-none right-12 whitespace-nowrap p-2 bg-white text-gray-600 font-medium text-sm transition ease-in-out duration-300">Adicionar categoria</span>
                <button class="p-5 rounded-full w-8 h-8 border-none flex justify-center items-center bg-green-500 hover:bg-white text-white hover:text-green-500 text-base cursor-pointer drop-shadow-md transition ease-in-out duration-300" wire:click="showModalCategory"><i class="fa-solid fa-tags"></i></button>
            </div>
        <button class="w-16 h-16 mt-2 text-4xl transition ease-int-out duration-300 flex items-center justify-center drop-shadow-md bg-green-500 hover:bg-white text-white hover:text-green-500 rounded-full {{ $rotateClass }}" wire:click="moreOptions"><i class="fa-solid fa-plus"></i></button>
    </div>
</div>

<script>
function copyToClipboard() {
    const textoParaCopiar = document.getElementById('linkInput').value;

    copiarTexto(textoParaCopiar);

    document.getElementById('copiedMessage').innerText = 'Copiado';

    setTimeout(function() {
        document.getElementById('copiedMessage').innerText = 'Copiar link';
    }, 3000);
};

function copiarTexto(texto) {
    const elementoTemp = document.createElement('textarea');
    elementoTemp.value = texto;
    document.body.appendChild(elementoTemp);
    elementoTemp.select();
    document.execCommand('copy');
    document.body.removeChild(elementoTemp);
}

</script>