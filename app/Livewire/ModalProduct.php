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

    public $show = false;
    public $id;
    public $formAction;
    public $action;
    public $name;
    public $description;
    public $id_category;
    public $image;
    public $imageCurrent;
    public $imagePath;

    #[On('openModalProduct')] 
    public function toggleModal($value)
    {
        $this->show = true;
        $this->name = '';
        $this->description = '';
        $this->id_category = '';
        $this->image = '';
        $this->imageCurrent = '';
        $this->formAction = 'store';
        $this->action = 'Incluir';
    }

    public function store()
    {
        $id_user = Auth::user()->id;
        $name_user = Auth::user()->name;

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

        Product::create([
            'name' => $this->name,
            'id_category' => $this->id_category,
            'image' => $this->image->store('images/products/' . $name_user, 'public'),
            'id_user' => $id_user,
        ]);

        $this->reset(['name', 'id_category', 'image']);
    
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
            $this->id_category = $product->id_category;
            $this->imageCurrent = $product->image;
        }

        $this->formAction = 'update('. $id . ')';
        $this->action = 'Salvar';
    }

    public function update($id)
    {
        $this->validate([
            'id_category' => 'required|int',
        ]);

        $product = Product::find($id);

        if ($product) {
            
            if ($this->image !== $product->image && !empty($this->image)) {
                $product->update(['image' => $this->image->store('images/products', 'public')]);
            }

            $product->update([
                'name' => $this->name,
                'id_category' => $this->id_category,
            ]);

            return redirect()->route('view.products')->with('success', 'Produto atualizado com sucesso!');
        }

        return redirect()->route('view.products')->with('error', 'Produto não encontrado.');
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function render()
    {
        $id_user = Auth::user()->id;
        $categories = Category::all()->where('id_user', $id_user);

        return view('livewire.modal-product', ['category' => $categories]);
    }
}