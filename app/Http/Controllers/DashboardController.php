<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;
        
        $categories = Category::where('id_user', $id)->count();

        $products = Product::where('id_user', $id)->count();

        $views = View::where('id_showcase', $id)->count();

        return view('dashboard', ['categories' => $categories, 'products' => $products, 'views' => $views]);
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
