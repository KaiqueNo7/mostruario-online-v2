<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        
        $categories = Category::where('id_user', $id)->get();
        $categories = $categories->count();

        $products = Product::where('id_user', $id)->get();
        $products = $products->count();

        return view('dashboard', ['categories' => $categories, 'products' => $products]);
    }

    public function category()
    {  
        return view('layouts.categories');
    }

    public function products()
    {  
        return view('layouts.products');
    }
}
