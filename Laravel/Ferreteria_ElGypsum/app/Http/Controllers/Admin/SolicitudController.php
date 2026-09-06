<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function index(Request $request)
    {
        $this->markExpiredSolicitudes();

        $tipo = $request->query('tipo');
        $estado = $request->query('estado');
        $desde = $request->query('desde');
        $hasta = $request->query('hasta');
        $vencimiento = $request->query('vencimiento');
        $buscar = $request->query('buscar');

        $solicitudes = Solicitud::withCount('detalles')
            ->when($tipo, fn ($query) => $query->where('tipo', $tipo))
            ->when($estado, fn ($query) => $query->where('estado', $estado))
            ->when($desde, fn ($query) => $query->whereDate('created_at', '>=', $desde))
            ->when($hasta, fn ($query) => $query->whereDate('created_at', '<=', $hasta))
            ->when($buscar, function ($query) use ($buscar) {
                $query->where(function ($q) use ($buscar) {
                    $q->where('codigo', 'like', "%{$buscar}%")
                        ->orWhere('cliente_nombre', 'like', "%{$buscar}%")
                        ->orWhere('cliente_telefono', 'like', "%{$buscar}%");
                });
            })
            ->when($vencimiento === 'vencidas', fn ($query) => $query->where('estado', 'vencida'))
            ->when($vencimiento === 'por_vencer', function ($query) {
                $query->whereNotIn('estado', ['aprobada', 'cerrada', 'rechazada', 'vencida'])
                    ->whereBetween('expires_at', [now(), now()->addDay()]);
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $stats = [
            'nuevas' => Solicitud::where('estado', 'nueva')->count(),
            'cotizaciones' => Solicitud::where('tipo', 'cotizacion')->count(),
            'apartados' => Solicitud::where('tipo', 'apartado')->count(),
            'vencidas' => Solicitud::where('estado', 'vencida')->count(),
            'por_vencer' => Solicitud::whereNotIn('estado', ['aprobada', 'cerrada', 'rechazada', 'vencida'])
                ->whereBetween('expires_at', [now(), now()->addDay()])
                ->count(),
        ];

        return view('admin.solicitudes.index', compact(
            'solicitudes',
            'stats',
            'tipo',
            'estado',
            'desde',
            'hasta',
            'vencimiento',
            'buscar'
        ));
    }

    public function show(Solicitud $solicitud)
    {
        $this->markExpiredSolicitudes();

        $solicitud->load('detalles');

        return view('admin.solicitudes.show', compact('solicitud'));
    }

    public function update(Request $request, Solicitud $solicitud)
    {
        $data = $request->validate([
            'estado' => 'required|in:nueva,en_revision,contactado,aprobada,rechazada,cerrada,vencida',
            'nota' => 'nullable|string|max:1000',
        ]);

        if ($data['estado'] === 'aprobada') {
            $data['approved_at'] = now();
        }

        if ($data['estado'] === 'cerrada') {
            $data['closed_at'] = now();
        }

        $solicitud->update($data);

        return back()->with('success', 'Solicitud actualizada correctamente.');
    }

    private function markExpiredSolicitudes(): void
    {
        Solicitud::whereNotIn('estado', ['aprobada', 'cerrada', 'rechazada', 'vencida'])
            ->whereNotNull('expires_at')
            ->where('expires_at', '<', now())
            ->update(['estado' => 'vencida']);
    }
}
