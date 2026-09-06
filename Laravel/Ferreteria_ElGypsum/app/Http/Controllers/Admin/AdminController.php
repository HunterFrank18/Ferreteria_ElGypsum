<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Venta;
use App\Models\VentaDetalle;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $clientesMorosos = Cliente::morosos()->get();

        $hoy = Carbon::today();

        $ventasHoy = Venta::whereDate('created_at', $hoy)->count();

        $ingresosHoy = Venta::whereDate('created_at', $hoy)
            ->where('estado','pagada')
            ->sum('total');

        $productosVendidosHoy = VentaDetalle::whereDate('created_at', $hoy)
            ->sum('cantidad');

      $topProductos = VentaDetalle::with('variante.product', 'variante.brand')
    ->selectRaw('product_variant_id, SUM(cantidad) as total')
    ->groupBy('product_variant_id')
    ->orderByDesc('total')
    ->take(5)
    ->get();

        // 🔥 DATOS PARA EL GRÁFICO
        $dias = collect(range(0,6))->map(function($i){
            return Carbon::now()->subDays(6 - $i)->format('D');
        });

        $ventasSemana = collect(range(0,6))->map(function($i){
            return Venta::whereDate('created_at', Carbon::now()->subDays(6 - $i))
                ->sum('total'); // 👈 mejor dinero que cantidad
        });

        return view('admin.index', compact(
            'clientesMorosos',
            'ventasHoy',
            'ingresosHoy',
            'productosVendidosHoy',
            'topProductos',
            'dias',
            'ventasSemana'
        ));
    }

    public function reporteDiario()
    {
        $hoy = Carbon::today();

        $ventas = Venta::whereDate('created_at', $hoy)->get();

        $clientesMorosos = Cliente::morosos()->get();

        return view('admin.reportes.diario', compact(
            'ventas',
            'clientesMorosos'
        ));
    }
}
