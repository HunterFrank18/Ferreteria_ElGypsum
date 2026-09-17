@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h3 class="mb-1">Bandeja de solicitudes</h3>
        <p class="text-muted mb-0">Cotizaciones y apartados con control de vencimiento.</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md mb-3">
        <div class="card border-0 shadow-sm"><div class="card-body"><span class="text-muted">Nuevas</span><h3>{{ $stats['nuevas'] }}</h3></div></div>
    </div>
    <div class="col-md mb-3">
        <div class="card border-0 shadow-sm"><div class="card-body"><span class="text-muted">Por vencer</span><h3>{{ $stats['por_vencer'] }}</h3></div></div>
    </div>
    <div class="col-md mb-3">
        <div class="card border-0 shadow-sm"><div class="card-body"><span class="text-muted">Vencidas</span><h3>{{ $stats['vencidas'] }}</h3></div></div>
    </div>
    <div class="col-md mb-3">
        <div class="card border-0 shadow-sm"><div class="card-body"><span class="text-muted">Cotizaciones</span><h3>{{ $stats['cotizaciones'] }}</h3></div></div>
    </div>
    <div class="col-md mb-3">
        <div class="card border-0 shadow-sm"><div class="card-body"><span class="text-muted">Apartados</span><h3>{{ $stats['apartados'] }}</h3></div></div>
    </div>
</div>

<form method="GET" action="{{ route('admin.solicitudes.index') }}" class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-3">
                <label>Tipo</label>
                <select name="tipo" class="form-control">
                    <option value="">Todos</option>
                    <option value="cotizacion" @selected($tipo === 'cotizacion')>Cotizaciones</option>
                    <option value="apartado" @selected($tipo === 'apartado')>Apartados</option>
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label>Estado</label>
                <select name="estado" class="form-control">
                    <option value="">Todos</option>
                    @foreach(['nueva', 'en_revision', 'contactado', 'aprobada', 'rechazada', 'cerrada', 'vencida'] as $item)
                        <option value="{{ $item }}" @selected($estado === $item)>{{ ucfirst(str_replace('_', ' ', $item)) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label>Vencimiento</label>
                <select name="vencimiento" class="form-control">
                    <option value="">Todos</option>
                    <option value="por_vencer" @selected($vencimiento === 'por_vencer')>Por vencer</option>
                    <option value="vencidas" @selected($vencimiento === 'vencidas')>Vencidas</option>
                </select>
            </div>

            <div class="col-md-2 mb-3">
                <label>Desde</label>
                <input type="date" name="desde" class="form-control" value="{{ $desde }}">
            </div>

            <div class="col-md-2 mb-3">
                <label>Hasta</label>
                <input type="date" name="hasta" class="form-control" value="{{ $hasta }}">
            </div>

            <div class="col-md-2 mb-3">
                <label>Buscar</label>
                <input type="text" name="buscar" class="form-control" value="{{ $buscar }}" placeholder="Cliente, tel, codigo">
            </div>
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-primary">Filtrar</button>
            <a href="{{ route('admin.solicitudes.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        </div>
    </div>
</form>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Codigo</th>
                    <th>Tipo</th>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Creada</th>
                    <th>Vence</th>
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($solicitudes as $solicitud)
                    <tr>
                        <td><strong>{{ $solicitud->codigo }}</strong></td>
                        <td>
                            <span class="badge {{ $solicitud->tipo === 'apartado' ? 'bg-warning text-dark' : 'bg-info text-dark' }}">
                                {{ ucfirst($solicitud->tipo) }}
                            </span>
                        </td>
                        <td>{{ $solicitud->cliente_nombre }}</td>
                        <td>{{ $solicitud->cliente_telefono }}</td>
                        <td>C$ {{ number_format((float) $solicitud->total, 2) }}</td>
                        <td><span class="badge {{ $solicitud->estado_badge }}">{{ $solicitud->estado_label }}</span></td>
                        <td>{{ $solicitud->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($solicitud->expires_at)
                                {{ $solicitud->expires_at->format('d/m/Y H:i') }}
                            @else
                                Sin vencer
                            @endif
                        </td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.solicitudes.show', $solicitud) }}">Ver</a>
                            @if($solicitud->whatsapp_url)
                                <a class="btn btn-sm btn-success" target="_blank" href="{{ $solicitud->whatsapp_url }}">WhatsApp</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-muted py-4">No hay solicitudes con esos filtros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $solicitudes->links() }}
</div>
@endsection
