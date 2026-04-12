<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Product;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariant;
use Illuminate\Support\Str;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $clientes = Cliente::where('estado','activo')->get();
    $products = Product::all();

    return view('admin.ventas.create', compact('clientes','products'));
}
public function pos()
{
    $variants = ProductVariant::with('product','brand')
        ->where('stock','>',0)
        ->get();

    $clientes = Cliente::where('estado','activo')->get();

    return view('admin.ventas.pos', compact('variants','clientes'));
}

public function storePOS(Request $request)
{

if($request->tipo_pago == 'credito' && !$request->cliente_id){
    throw new \Exception("Debe seleccionar cliente para crédito");
}

    DB::beginTransaction();

    try {

        $venta = Venta::create([
            'numero_factura' => 'FAC-'.Str::upper(Str::random(6)),
            'user_id' => auth()->id(),
            'cliente_id' => $request->cliente_id,
            'tipo_pago' => $request->tipo_pago,
            'subtotal' => $request->subtotal,
            'impuesto' => 0,
            'total' => $request->total,
            'estado' => 'emitida'
        ]);

        foreach ($request->productos as $item) {

            $variant = ProductVariant::findOrFail($item['id']);

            VentaDetalle::create([
                'venta_id' => $venta->id,
                'product_variant_id' => $variant->id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $variant->price,
                'subtotal' => $item['cantidad'] * $variant->price
            ]);

            // 🔥 descontar stock
            $variant->decrement('stock', $item['cantidad']);
        }

        DB::commit();

        return response()->json(['success' => true]);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['error' => $e->getMessage()]);
    }
}

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
