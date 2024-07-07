<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-lg" aria-label="Sidebar">
    <div class="h-full p-3 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="shrink-0 flex items-center justify-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div> 

       <ul class="space-y-2 font-medium">
            <li>
                <x-side-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span class="ms-3">Dashboard</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('view.category')" :active="request()->routeIs('view.category')">
                    <i class="fa-solid fa-tags"></i>
                    <span class="ms-3">Categorias</span>
                </x-side-link>
            </li>
            <li>
                <x-side-link :href="route('view.products')" :active="request()->routeIs('view.products')">
                    <i class="fa-solid fa-box-open"></i>
                    <span class="ms-3">Jóias</span>
                </x-side-link>
            </li>
       </ul>
    </div>
</aside>