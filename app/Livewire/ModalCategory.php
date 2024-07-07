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

    public $show = false;
    public $id;
    public $name;
    public $description;
    public $presentation;
    public $number_installments;
    public $image;
    public $imageCurrent;
    public $formAction;
    public $action;
    public $fieldNumberInstallments = false;

    #[On('openModalCategory')] 
    public function togglePopup($value)
    {
        $this->show = $value;
        $this->name = "";
        $this->description = "";
        $this->presentation = "";
        $this->number_installments = "";
        $this->image = "";
        $this->formAction = 'store';
        $this->action = 'Incluir';
    }
 
    public function store()
    {
        $id_user = Auth::user()->id;

        $this->validate([
            'name' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($id_user) {
                    return $query->where('id_user', $id_user);
                }),
            ],
        ]);

        Category::create([
            'name' => $this->name,
            'description' => null,
            'presentation' => 4,
            'image' => null,
            'number_installments' =>  null,
            'id_user' => Auth::user()->id,
        ]);
    
        $this->reset(['name']);
    
        toastr()->success('Categoria criada com sucesso', 'Sucesso', ['timeOut' => 2000]);
    
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
            $this->imageCurrent = $category->image;
        }

        $this->formAction = 'update('. $id .')';
        $this->action = 'Salvar';
    }

    public function update($id)
    {
        $id_user = Auth::user()->id;
        $category = Category::find($id);

        if($category){
            if ($this->name !== $category->name) {
                $this->validate([
                    'name' => [
                        'required',
                        Rule::unique('categories')->where(function ($query) use ($id_user) {
                            return $query->where('id_user', $id_user);
                        }),
                        
                    ]
                ]);
            }
    
            $category->update([
                'name' => $this->name
            ]);
    
            toastr()->success('Categoria atualizada com sucesso', 'Sucesso', ['timeOut' => 2000]);
            $this->show = false;
            $this->dispatch('categoryUpdated');
            return;
        }

        return redirect()->route('view.category')->with('error', 'Categoria não encontrada.');
    }

    public function closeModal()
    {
        $this->show = false;
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
