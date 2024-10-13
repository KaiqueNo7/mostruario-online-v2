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
    public $weight;
    public $type;
    public $types = ['1' => 'Ouro','2' => 'Prata'];

    #[On('openModalProduct')] 
    public function toggleModal($value)
    {
        $this->show = true;
        $this->name = '';
        $this->description = '';
        $this->id_category = '';
        $this->weight = '';
        $this->type = '';
        $this->image = '';
        $this->imageCurrent = '';
        $this->formAction = 'store';
        $this->action = 'Incluir';
    }

    public function store()
    {
        $id_user = Auth::user()->id;
        $name_user = Auth::user()->name;
        $name_user = strtolower(str_replace(' ', '_', $name_user));

        $this->validate([
            'id_category' => 'required|int',
            'weight' => 'required',
            'type' => 'required',
            'image' => 'required|image',
        ]);

        Product::create([
            'name' => 'Jóia',
            'id_category' => $this->id_category,
            'image' => $this->image->store('images/products/' . $name_user, 'public'),
            'id_user' => $id_user,
            'weight' => $this->weight,
            'type' => $this->type,
        ]);

        $this->reset(['name', 'id_category', 'image']);
    
        flash()->success('Produto criado com sucesso', 'Sucesso', ['timeOut' => 2000]);
    
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
            $this->weight = round($product->weight, 1);
            $this->type = $product->type;
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

            $update = $product->update([
                'id_category' => $this->id_category,
                'weight' => $this->weight,
                'type' => $this->type,
            ]);

            if($update){
                flash()->success('Produto atualizado com sucesso');
                $this->show = false;
                $this->dispatch('productUpdated');
                return;
            }
            
            flash()->error('Erro ao atualizar o produto');   
        }
        
        flash()->error('O produto não foi encontrado');

        return redirect()->route('view.products');
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