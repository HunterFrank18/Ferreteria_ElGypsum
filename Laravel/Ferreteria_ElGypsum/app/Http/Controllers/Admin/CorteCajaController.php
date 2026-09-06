<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CorteCaja;
use App\Models\Pago;
use App\Models\Venta;

class CorteCajaController extends Controller
{

    public function abrir()
    {
        CorteCaja::create([
            'user_id' => auth()->id(),
            'monto_inicial' => request('monto_inicial'),
            'apertura' => now()
        ]);

        return back()->with('success','Caja abierta');
    }

    public function cerrar()
    {
        $caja = CorteCaja::whereNull('cierre')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if(!$caja){
            return back()->with('error','No hay caja abierta');
        }

        $ventas = Venta::whereBetween('created_at', [$caja->apertura, now()])->get();
        $pagos  = Pago::whereBetween('created_at', [$caja->apertura, now()])->get();

        $caja->update([
            'total_ventas' => $ventas->sum('total'),
            'total_efectivo' => $pagos->where('metodo','efectivo')->sum('monto'),
            'total_transferencia' => $pagos->where('metodo','transferencia')->sum('monto'),
            'total_tarjeta' => $pagos->where('metodo','tarjeta')->sum('monto'),
            'total_credito' => $ventas->where('tipo_pago','credito')->sum('total'),
            'total_abonos' => $pagos->sum('monto'),
            'saldo_final' =>
                $caja->monto_inicial +
                $pagos->sum('monto'),
            'cierre' => now()
        ]);

        return back()->with('success','Caja cerrada correctamente');
    }
}

