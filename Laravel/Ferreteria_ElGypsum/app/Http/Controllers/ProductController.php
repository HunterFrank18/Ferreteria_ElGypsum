<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->search;

        $products = Product::with('category')

        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })

        ->paginate(10);

        return view('admin.products.index', compact('products','search'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image'
        ]);


        $imagePath = null;

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products','public');
        }


        Product::create([

            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'image'=>$imagePath

        ]);


        return redirect()->route('admin.products.index')
        ->with('success','Producto creado correctamente');
    }



    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }



    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price'=>'nullable|numeric',
            'stock'=>'nullable|integer',
            'image'=>'nullable|image'
        ]);


        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('products','public');
            $product->image = $imagePath;
        }


        $product->update([

            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock

        ]);


        return redirect()->route('admin.products.index')
        ->with('success','Producto actualizado');
    }



    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('admin.products.index')
        ->with('success','Producto eliminado');

    }

}
