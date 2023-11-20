<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SelectCategory extends Component
{
    public $idCategory;

    public function filterCategoryById()
    {
        $this->dispatch('filterCategory', $this->idCategory);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.select-category', ['category' => $categories]);
    }
}
