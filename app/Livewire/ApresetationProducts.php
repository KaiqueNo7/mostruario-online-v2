<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ApresetationProducts extends Component
{
    use WithPagination;

    public $id;
    public $search;
    public $idCategory;
    public $orderBy = 'desc';
    

    #[On('filterCategory')] 
    public function filterCategory($value)
    {
        $this->idCategory = $value;
    }

    #[On('OrderByCategory')] 
    public function OrderByCategory($orderBy)
    {
        $this->orderBy = $orderBy;
    }

    public function render()
    {
        $products = Product::where('id_user', $this->id)

        ->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
         })
         
         ->when($this->idCategory, function ($query, $idCategory) {
            return $query->where('category', $idCategory);
         })
         
         ->orderBy('created_at', $this->orderBy)->simplePaginate(8);

        return view('livewire.apresetation-products', ['products' => $products]);
    }
}
