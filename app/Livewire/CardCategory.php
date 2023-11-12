<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CardCategory extends Component
{
    use WithPagination;

    public $openModal = false;
    public $search = '';
    public $number_paginate = 8;
    
    public function edit($id)
    {
        $this->openModal = true;
        $this->dispatch('openModalCategory', $this->openModal);
        $this->dispatch('mount', id: $id);
    }

    public function destroy($id){
        Category::where('id', $id)->delete();
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

        return view('livewire.card-category', ['categories' => $categories]);
    }
}
