<div>
    @if(session()->has('success'))
    <div id="alert" class="fixed right-5 top-5 w-auto mb-4 mt-4 bg-teal-100 border-t-4 border-teal-500 rounded-sm text-teal-900 px-4 py-3 shadow-md z-50" role="alert">
        <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div><p class="font-bold">{{ session('success') }}</p></div>
        </div>
    </div>
    @endif
</div>