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

    public $show = false;
    public $images = [];
    public $id_category;
    public $name;
    public $number_product = 0;

    #[On('openModalVariousProducts')] 
    public function toggleModal($value)
    {
        $this->show = $value;
    }

    public function store()
    {
        $this->validate([
            'id_category' => 'required|int',
            'images.*' => 'required|image',
        ]);

        $this->number_product = Product::where('name', 'like', '%' . $this->name . '%')->where('id_user', Auth::user()->id)->count();

        foreach($this->images as $image){
            Product::create([
                'name' => $this->name . " " . $this->number_product,
                'id_category' => $this->id_category,
                'image' => $image->store('images/products/' . Auth::user()->name, 'public'),
                'id_user' => Auth::user()->id,
            ]);

            $this->number_product++;
        }
    
        toastr()->success('success', 'Produtos incluídos com sucesso.');
    
        return redirect()->route('view.products');
    }

    public function removeImage($n)
    {
        unset($this->images[$n]);
        $this->images = array_values($this->images);
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        $id_user = Auth::user()->id;
        $categories = Category::all()->where('id_user', $id_user);

        return view('livewire.modal-various-products', ['category' => $categories]);
    }
}
