<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ModalVariousProducts extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $images = [];
    public $id_category;
    public $name;
    public $number_product = 0;

    #[On('openModalVariousProducts')] 
    public function toggleModal($value)
    {
        $this->showModal = $value;
    }

    public function store()
    {
        $id_user = Auth::user()->id;

        $this->validate([
            'id_category' => 'required|int',
            'images.*' => 'required|image',
        ]);

        foreach($this->images as $image){
            Product::create([
                'name' => $this->name . " " . $this->number_product,
                'category' => $this->id_category,
                'image' => $image->store('images/products', 'public'),
                'id_user' => Auth::user()->id,
            ]);

            $this->number_product++;
        }
    
        session()->flash('success', 'Produtos incluídos com sucesso.');
    
        return redirect()->route('view.products');
    }

    public function removeImage($n)
    {
        unset($this->images[$n]);
        $this->images = array_values($this->images);
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $id = Auth::user()->id;
        $categories = Category::all()->where('id_user', $id);

        return view('livewire.modal-various-products', ['category' => $categories]);
    }
}
