<?php
namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ModalProduct extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $id;
    public $formAction;
    public $action;
    public $name;
    public $description;
    public $id_category;
    public $image;

    #[On('openModalProduct')] 
    public function toggleModal($value)
    {
        $this->showModal = $value;
        $this->formAction = 'store';
        $this->action = 'Incluir';
    }

    public function store()
    {
        $id_user = Auth::user()->id;

        $this->validate([
            'name' => [
                'required',
                Rule::unique('products')->where(function ($query) use ($id_user) {
                    return $query->where('id_user', $id_user);
                }),
            ],
            'id_category' => 'required|int',
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('images/products', 'public');

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->id_category,
            'image' => $imagePath,
            'id_user' => Auth::user()->id,
        ]);

        $this->reset(['name', 'description', 'category', 'image']);
    
        session()->flash('success', 'Produto incluído com sucesso.');
    
        return redirect()->route('view.products');
    }

    #[On('editProduct')] 
    public function editProduct($id)
    {
        $product = Product::find($id);

        if ($product) {
            $this->id = $product->id;
            $this->name = $product->name;
            $this->description = $product->description;
            $this->id_category = $product->category;
            $this->image = $product->image;
        }

        $this->formAction = 'update('. $id . ')';
        $this->action = 'Salvar';
    }

    public function update($id)
    {
        $id_user = Auth::user()->id;

        $this->validate([
            'name' => [
                'required',
                Rule::unique('products')->where(function ($query) use ($id_user) {
                    return $query->where('id_user', $id_user);
                }),
            ],
            'id_category' => 'required|int',
        ]);

        $product = Product::find($id);

        if ($product) {
           $image = $product->image;
        }

        if (!$product) {
            return redirect()->route('view.products')->with('error', 'Produto não encontrado.');
        }

        $product->update([
            'name' => $this->name,
            'description' => $this->description,
            'category' => $this->id_category,
            'image' => $this->image,
        ]);
        
        if ($this->image !== $image) {
            $imagePath = $this->image->store('images/products', 'public');
            $product->update(['image' => $imagePath]);
        }
        
        return redirect()->route('view.products')->with('success', 'Produto atualizado com sucesso!');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.modal-product', ['category' => $categories]);
    }
}