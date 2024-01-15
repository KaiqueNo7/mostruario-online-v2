<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class SelectCategory extends Component
{
    public $id_category;

    public function filterCategoryById()
    {
        $this->dispatch('filterCategory', $this->id_category);
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.select-category', ['category' => $categories]);
    }
}
