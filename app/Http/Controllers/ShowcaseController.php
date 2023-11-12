<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowcaseController extends Controller
{
    public function view(string $showcase): View   
    {
        $id = User::where('name', str_replace('-', ' ', $showcase))->get();

        foreach($id as $id){
           $category = Category::where('id_user', $id->id)->get();
           $name = $id->name;
        }

        return view('showcase', ['category' => $category, 'user' => $name]);
    }

    public function render(string $showcase, string $category): View
    {
        $id = User::where('name', str_replace('-', ' ', $showcase))->get();

        foreach($id as $id){
            $products = Product::where('id', $category)->get();
            $name = $id->name;
        }

        return view('showcase', ['products' => $products, 'user' => $name]);
    }
}
