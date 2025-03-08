<?php

namespace App\Livewire;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CardProduct extends Component
{
    use WithPagination;

    public $open_modal = false;

    public $search;

    public $id_category;

    public $order_by = 'desc';

    public $message = 'Você tem certeza que deseja excluir o produto?';

    public int $per_page = 8;

    public $type;

    public $types = ['1' => 'Ouro', '2' => 'Prata'];

    #[On('productUpdated')]
    public function refreshProduct()
    {
        $this->render();
    }

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholders.skeleton', $params);
    }

    public function edit($id)
    {
        $this->dispatch('openModalProduct', true)->to(ModalProduct::class);
        $this->dispatch('editProduct', id: $id)->to(ModalProduct::class);
    }

    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        $image_exists = null;
        $image_path = $product->image;

        if ($image_path) {
            $image_exists = Storage::disk('public')->exists($image_path);
        }

        if ($image_exists) {
            Storage::disk('public')->delete($image_path);
        }

        $delete = Product::where('id', $id)->delete();
        if ($delete) {
            flash()->success('Jóia deletada com sucesso!');

            return;
        }

        flash()->success('Erro ao deletar jóia');
    }

    #[On('filterCategory')]
    public function filterCategory($value)
    {
        $this->id_category = $value;
    }

    #[On('orderByCategory')]
    public function orderByCategory($order_by)
    {
        $this->order_by = $order_by;
    }

    public function selectType(): void
    {
        $this->type = $this->type;
    }

    public function render()
    {
        $id = Auth::user()->id;

        $products = Product::where('id_user', $id)
            ->when($this->search, function ($query, $search) {
                return $query->where('id', 'like', '%'.$search.'%');
            })
            ->when($this->id_category, function ($query, $id_category) {
                return $query->where('id_category', $id_category);
            })
            ->when($this->type, function ($query, $type) {
                return $query->where('type', $type);
            })
            ->orderBy('created_at', $this->order_by)->paginate(
                $this->per_page
            );

        $total_products = Product::where('id_user', $id)->get();

        $count = $total_products->count();

        $prices = Price::first();

        return view('livewire.card-product', ['products' => $products, 'count' => $count, 'prices' => $prices]);
    }

    public function loadMore(): void
    {
        $this->per_page += 8;
    }
}
