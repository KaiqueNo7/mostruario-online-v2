<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CardCategory extends Component
{
    use WithPagination;
    
    public $selectedCategory = []; 
    public $open_modal = false;
    public $search = '';
    public $message = "Você tem certeza que deseja excluir a categoria?";
    public $destroy = "destroyCategory";
    public $isChecked = false;

    #[On('categoryUpdated')]
    public function refreshCategory(){
        $this->render();
    }
    
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
        $products_in_category = Product::where('id_category', $id)->get();
        $count_products = count($products_in_category);

        foreach($products_in_category as $product){
            $image_path = $product->image;

            $image_exists = Storage::disk('public')->exists($image_path);

            if($image_exists){
                Storage::disk('public')->delete($image_path);
            }    
        }

        if($count_products){
            $products = Product::where('id_category', $id)->delete();

            if(!$products){
                flash()->error('Erro ao deletar os produtos da categoria.');
                return;
            }        
        }
        
        $category = Category::where('id', $id)->delete();

        if($category){
            flash()->success('Categoria deletada com sucesso');
            return;
        }

        flash()->error('Erro ao deletar a categoria.', 'Erro', ['timeOut' => 2000]);
    }

    public function deleteSelected(){
        foreach($this->selectedCategory as $id){
            Category::where('id', $id)->delete();
            Product::where('id_category', $id)->delete();
        }

        flash()->success('Categorias deletadas com sucesso', 'Sucesso', ['timeOut' => 2000]);
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
