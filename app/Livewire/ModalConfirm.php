<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalConfirm extends Component
{
    public $openModalConfirm;
    public $idCategory;
    public $idProduct;
    public $message;
    public $destroy;

    #[On('openModalConfirm')]
    public function openModalConfirm($id, $message, $destroy)
    {
        $this->message = $message;
        $this->destroy = $destroy;        
        $this->openModalConfirm = true;
        $this->idCategory = $id;
    }
    
    public function closeModal()
    {
        $this->openModalConfirm = false;
    }

    public function destroyCategory($id){
        $products = Product::where('id_category', $id)->get();
        
        foreach($products as $product){
            $image_path = $product->image;

            $image_exists = Storage::disk('public')->exists($image_path);

            if($image_exists){
                Storage::disk('public')->delete($image_path);
            }    
        }

        Product::where('id', $id)->delete();
        Category::where('id', $id)->delete();

        return redirect()->route('view.category')->with('success', 'Categoria deletada com sucesso');   
    }

    public function destroyProduct($id){
        $product = Product::where('id', $id)->first();

        if($product){
            $image_path = $product->image;

            $image_exists = Storage::disk('public')->exists($image_path);

            if($image_exists){
                Storage::disk('public')->delete($image_path);
            }

            Product::where('id', $id)->delete();
            
            session()->flash('success', 'Produto deletado com sucesso!');

            return redirect()->route('view.products');
        }
        
        session()->flash('error', 'Nenhum produto encontrado!');

        return redirect()->route('view.products');
    }

    public function render()
    {
        return view('livewire.modal-confirm');
    }
}
