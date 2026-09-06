<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'desde' => $request->query('desde'),
            'hasta' => $request->query('hasta'),
            'metodo' => $request->query('metodo'),
            'tipo_pago' => $request->query('tipo_pago'),
            'estado' => $request->query('estado'),
            'buscar' => $request->query('buscar'),
        ];

        $pagosQuery = Pago::with('venta.cliente')
            ->when($filters['desde'], fn ($query) => $query->whereDate('fecha_pago', '>=', $filters['desde']))
            ->when($filters['hasta'], fn ($query) => $query->whereDate('fecha_pago', '<=', $filters['hasta']))
            ->when($filters['metodo'], fn ($query) => $query->where('metodo', $filters['metodo']))
            ->when($filters['tipo_pago'], function ($query) use ($filters) {
                $query->whereHas('venta', fn ($q) => $q->where('tipo_pago', $filters['tipo_pago']));
            })
            ->when($filters['estado'], function ($query) use ($filters) {
                $query->whereHas('venta', fn ($q) => $q->where('estado', $filters['estado']));
            })
            ->when($filters['buscar'], function ($query) use ($filters) {
                $buscar = $filters['buscar'];

                $query->whereHas('venta', function ($q) use ($buscar) {
                    $q->where('numero_factura', 'like', "%{$buscar}%")
                        ->orWhereHas('cliente', function ($cliente) use ($buscar) {
                            $cliente->where('nombre', 'like', "%{$buscar}%")
                                ->orWhere('telefono', 'like', "%{$buscar}%");
                        });
                });
            });

        $stats = [
            'cantidad' => (clone $pagosQuery)->count(),
            'total' => (clone $pagosQuery)->sum('monto'),
            'efectivo' => (clone $pagosQuery)->where('metodo', 'efectivo')->sum('monto'),
            'transferencia' => (clone $pagosQuery)->where('metodo', 'transferencia')->sum('monto'),
            'tarjeta' => (clone $pagosQuery)->where('metodo', 'tarjeta')->sum('monto'),
            'credito' => (clone $pagosQuery)
                ->whereHas('venta', fn ($q) => $q->where('tipo_pago', 'credito'))
                ->sum('monto'),
            'contado' => (clone $pagosQuery)
                ->whereHas('venta', fn ($q) => $q->where('tipo_pago', 'contado'))
                ->sum('monto'),
        ];

        $pagos = $pagosQuery
            ->latest('fecha_pago')
            ->paginate(10)
            ->withQueryString();

        $ventasCredito = Venta::with(['cliente', 'pagos'])
            ->where('tipo_pago', 'credito')
            ->get()
            ->filter(fn ($v) => $v->saldo > 0)
            ->values();

        return view('admin.pagos.index', compact('pagos', 'ventasCredito', 'filters', 'stats'));
    }

    public function create()
    {
        $ventas = Venta::where('estado', 'pendiente')->get();

        return view('admin.pagos.create', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'monto' => 'required|numeric|min:1',
            'metodo' => 'required',
        ]);

        $venta = Venta::with('pagos')->findOrFail($request->venta_id);

        if ($request->monto > $venta->saldo) {
            return back()->with('error', 'El monto excede el saldo pendiente');
        }

        Pago::create([
            'venta_id' => $venta->id,
            'monto' => $request->monto,
            'metodo' => $request->metodo,
            'fecha_pago' => now(),
        ]);

        $venta->refresh();
        $totalPagado = $venta->pagos()->sum('monto');

        if ($totalPagado >= $venta->total) {
            $venta->update(['estado' => 'pagada']);
        }

        return redirect()->back()->with('success', 'Abono registrado correctamente');
    }

    public function print($id)
    {
        $pago = Pago::with([
            'venta.cliente',
            'venta.detalles.productoVariante.product',
            'venta.detalles.productoVariante.brand',
        ])->findOrFail($id);

        $pdf = Pdf::loadView('admin.pagos.factura', compact('pago'));

        return $pdf->download('factura_' . $pago->id . '.pdf');
    }
}
