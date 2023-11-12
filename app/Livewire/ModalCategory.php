<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ModalCategory extends Component
{
    use WithFileUploads;

    public $showModal = false;
    public $id;
    public $name;
    public $description;
    public $presentation;
    public $number_installments;
    public $image;
    public $formAction;
    public $action;
    public $fieldNumberInstallments = false;

    #[On('openModalCategory')] 
    public function togglePopup($value)
    {
        $this->name = "";
        $this->description = "";
        $this->presentation = "";
        $this->number_installments = "";
        $this->image = "";
        $this->showModal = $value;
        $this->formAction = 'store';
        $this->action = 'Incluir';
    }
 
    public function store()
    {
        $id_user = Auth::user()->id;
        $imagePath = null;

        $this->validate([
            'name' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($id_user) {
                    return $query->where('id_user', $id_user);
                }),
            ],
            'presentation' => 'required|int',
        ]);

        if(!empty($this->image)){
            $imagePath = $this->image->store('images', 'public');
        }
        
        if(!empty($this->number_installments)){
            $number_installments = $this->number_installments;
        } else {
            $number_installments = null;
        }
        
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'presentation' => $this->presentation,
            'image' => $imagePath,
            'number_installments' =>  $number_installments,
            'id_user' => Auth::user()->id,
        ]);
    
        $this->reset(['name', 'description', 'presentation', 'number_installments', 'image']);
    
        session()->flash('success', 'Categoria incluída com sucesso.');
    
        return redirect()->route('view.category');
    }

    #[On('mount')] 
    public function mountCategory($id)
    {
        $category = Category::find($id);

        if ($category) {
            $this->id = $category->id;
            $this->name = $category->name;
            $this->description = $category->description;
            $this->presentation = $category->presentation;
            $this->number_installments = $category->number_installments;
            $this->image = $category->image;
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
                Rule::unique('categories')->where(function ($query) use ($id_user) {
                    return $query->where('id_user', $id_user);
                }),
            ],
            'description' => 'required|string',
            'presentation' => 'required|int',
        ]);

        $category = Category::find($id);

        if ($category) {
            $image = $category->image;
        }

        if (!$category) {
            return redirect()->route('view.category')->with('error', 'Categoria não encontrada.');
        }

        $category->update([
            'name' => $this->name,
            'description' => $this->description,
            'presentation' => $this->presentation,
            'number_installments' => $this->number_installments,
        ]);

        if ($this->image !== $image) {
            $imagePath = $this->image->store('images', 'public');
            $category->update(['image' => $imagePath]);
        }
        
        return redirect()->route('view.category')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function showField()
    {
        $this->fieldNumberInstallments = false;

        if ($this->presentation === '2') {
            $this->fieldNumberInstallments = true;
        }
    }

    public function render()
    {
        return view('livewire.modal-category');
    }
}
