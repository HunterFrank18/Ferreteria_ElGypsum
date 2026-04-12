<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::All();

        return view('/tienda.index', compact('categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)
            ->with('products.variants.brand')
            ->firstOrFail();

        return view('category', compact('category'));
    }

    public function product($id)
    {
        $product = Product::with('variants.brand')->findOrFail($id);

        return view('product', compact('product'));
    }
}
