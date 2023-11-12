<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CardCategory extends Component
{
    use WithPagination;

    public $openModal = false;
    public $search = '';
    public $number_paginate = 8;
    public $seeMoreCount = false;
    
    public function edit($id)
    {
        $this->openModal = true;
        $this->dispatch('openModalCategory', $this->openModal);
        $this->dispatch('mount', id: $id);
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
        Product::where('category', $id)->delete();
        
        return redirect()->route('view.category')->with('success', 'Categoria deletada com sucesso');   
    }

    public function seeMore()
    {
        $this->number_paginate = $this->number_paginate + 8;
    }

    public function render()
    {
        $id = Auth::user()->id;

        $categories = Category::where('id_user', $id)->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->simplePaginate($this->number_paginate);

        $count = $categories->count();

        if($count > 8){
            $this->seeMoreCount = true;
        }

        return view('livewire.card-category', ['categories' => $categories]);
    }
}
