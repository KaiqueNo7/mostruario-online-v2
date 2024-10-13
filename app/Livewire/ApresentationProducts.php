<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Livewire\Component;
use Livewire\WithPagination;

class ApresentationProducts extends Component
{
    use WithPagination;

    public $id;
    public $user;
    public $search;
    public $idCategory;
    public $category;
    public $modal = '';
    public string $orderBy = 'desc';
    public int $perPage = 8;
    public $type;
    public $types = ['1' => 'Ouro','2' => 'Prata'];
    
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

    public function selectType($type)
    {
        $this->type = $type;
    }

    public function openModal($id)
    {
        $this->modal = $id;
    }

    public function closeModal()
    {
        $this->modal = '';
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

         ->when($this->type, function ($query, $type) {
            return $query->where('type', $type);
         })
         
         ->with('category')
         ->orderBy('created_at', $this->orderBy)
         ->paginate($this->perPage);

         $categories = Category::where('id_user', $this->id)->get();

        return view('livewire.apresentation-products', ['products' => $products], ['categories' => $categories]);
    }

    public function loadMore(): void
    {
        $this->perPage += 8;    
    }
}
