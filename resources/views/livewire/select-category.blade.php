<div class="w-full">
    <select wire:model="idCategory"  wire:change="filterCategoryById" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Selecione a categoria</option>
            @foreach ($category as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
    </select>
    @error('id_category') <span class="error text-red-600" role="alert">{{ $message }}</span> @enderror
</div>
