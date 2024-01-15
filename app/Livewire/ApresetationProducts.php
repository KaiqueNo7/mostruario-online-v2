<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ApresetationProducts extends Component
{
    use WithPagination;

    public $id;
    public $search;
    public $idCategory;
    public string $orderBy = 'asc';
    public int $perPage = 8;
    
    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.card-skeleton', $params);
    }

    public function filterCategory($value)
    {
        $this->idCategory = $value;
    }

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
            return $query->where('id_category', $idCategory);
         })
         
         ->orderBy('created_at', $this->orderBy)->paginate(
            $this->perPage
         );

         $categories = Category::where('id_user', $this->id)->get();

        return view('livewire.apresetation-products', ['products' => $products], ['categories' => $categories]);
    }

    public function loadMore(): void
    {
        $this->perPage += 8;    
    }
}
