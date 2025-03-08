<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $id = Auth::user()->id;

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();

        $categories = Category::where('id_user', $id)->count();
        $categoriesYesterday = Category::whereDate('created_at', $yesterday)->where('id_user', $id)->count();
        $categoriesToday = Category::whereDate('created_at', $today)->where('id_user', $id)->count();

        $categoriesDifference = $categoriesToday - $categoriesYesterday;

        $products = Product::where('id_user', $id)->count();
        $productYesterday = Product::whereDate('created_at', $yesterday)->where('id_user', $id)->count();
        $productToday = Product::whereDate('created_at', $today)->where('id_user', $id)->count();

        $productDifference = $productToday - $productYesterday;

        $views = View::where('id_showcase', $id)->count();
        $viewsYesterday = View::whereDate('created_at', $yesterday)->where('id_showcase', $id)->count();
        $viewsToday = View::whereDate('created_at', $today)->where('id_showcase', $id)->count();

        $viewsDifference = $viewsToday - $viewsYesterday;

        return view('dashboard', [
            'categories' => $categories,
            'categoriesDifference' => $categoriesDifference,
            'products' => $products,
            'productDifference' => $productDifference,
            'views' => $views,
            'viewsDifference' => $viewsDifference,
        ]);
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
