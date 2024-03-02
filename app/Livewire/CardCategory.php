<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class CardCategory extends Component
{
    use WithPagination;

    public $open_modal = false;
    public $search = '';
    public $message = "Você tem certeza que deseja excluir a categoria?";
    public $destroy = "destroyCategory";

    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }
    
    public function edit($id)
    {
        $this->dispatch('openModalCategory', true);
        $this->dispatch('mount', id: $id);
    }
    
    public function delete($id)
    {
        $products = Product::where('id_category', $id)->get();
        
        foreach($products as $product){
            $image_path = $product->image;

            $image_exists = Storage::disk('public')->exists($image_path);

            if($image_exists){
                Storage::disk('public')->delete($image_path);
            }    
        }

        Product::where('id_category', $id)->delete();
        Category::where('id', $id)->delete();

        toastr()->success('A categoria foi deletada', 'Sucesso', ['timeOut' => 2000]);

        return redirect()->route('view.category');
    }

    public function render()
    {
        $id = Auth::user()->id;

        $categories = Category::where('id_user', $id)->get();
        $count = $categories->count();

        $categories = Category::where('id_user', $id)
        ->when($this->search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->with('products')
        ->orderBy('name', 'asc')
        ->simplePaginate(20);

        return view('livewire.card-category', ['categories' => $categories, 'count' => $count]);
    }
}
