<div class="w-full">
    <select wire:model="orderBy"  wire:change="OrderByCategory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-green-500 focus:border-green-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
            <option value="">Ordenar por</option>
            <option value="desc">Mais recente</option>
            <option value="asc">Menos recente</option>
    </select>
</div>