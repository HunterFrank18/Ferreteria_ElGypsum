<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(Request $request)
    {
        $productId = $request->product_id;

        $query = ProductVariant::with(['product','brand'])->latest();

        if ($productId) {
            $query->where('product_id', $productId);
        }

        $variants = $query->paginate(10)->withQueryString();
        $products = Product::all();

        return view('admin.variants.index', compact('variants','products','productId'));
    }

    public function create()
    {
        $products = Product::all();
        $brands = Brand::all();
        return view('admin.variants.create', compact('products','brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'brand_id' => 'required|exists:brands,id',
            'color' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'sku' => 'nullable'
        ]);

        ProductVariant::create($request->all());

        return redirect()->route('admin.variants.index')
            ->with('success','Variante creada');
    }

    public function edit($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $products = Product::all();
        $brands = Brand::all();

        return view('admin.variants.edit', compact('variant','products','brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'brand_id' => 'required|exists:brands,id',
            'color' => 'nullable|string|max:100',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'sku' => 'nullable'
        ]);

        $variant = ProductVariant::findOrFail($id);
        $variant->update($request->all());

        return redirect()->route('admin.variants.index')
            ->with('success','Variante actualizada');
    }

    public function destroy($id)
    {
        $variant = ProductVariant::findOrFail($id);
        $variant->delete();

        return redirect()->route('admin.variants.index')
            ->with('success','Variante eliminada');
    }
}
