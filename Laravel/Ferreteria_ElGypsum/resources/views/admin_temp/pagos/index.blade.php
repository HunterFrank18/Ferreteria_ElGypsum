@extends('layouts.admin')

@section('title', 'PAGOS')

@section('content')
<div class="container">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h2 class="mb-1">Pagos</h2>
            <p class="text-muted mb-0">Filtra pagos por fecha, metodo, tipo de venta y cliente.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="GET" action="{{ route('admin.pagos.index') }}" class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>Desde</label>
                    <input type="date" name="desde" class="form-control" value="{{ $filters['desde'] }}">
                </div>

                <div class="col-md-2 mb-3">
                    <label>Hasta</label>
                    <input type="date" name="hasta" class="form-control" value="{{ $filters['hasta'] }}">
                </div>

                <div class="col-md-2 mb-3">
                    <label>Metodo</label>
                    <select name="metodo" class="form-control">
                        <option value="">Todos</option>
                        <option value="efectivo" @selected($filters['metodo'] === 'efectivo')>Efectivo</option>
                        <option value="transferencia" @selected($filters['metodo'] === 'transferencia')>Transferencia</option>
                        <option value="tarjeta" @selected($filters['metodo'] === 'tarjeta')>Tarjeta</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label>Tipo venta</label>
                    <select name="tipo_pago" class="form-control">
                        <option value="">Todas</option>
                        <option value="contado" @selected($filters['tipo_pago'] === 'contado')>Contado</option>
                        <option value="credito" @selected($filters['tipo_pago'] === 'credito')>Credito</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value="">Todos</option>
                        <option value="pagada" @selected($filters['estado'] === 'pagada')>Pagada</option>
                        <option value="pendiente" @selected($filters['estado'] === 'pendiente')>Pendiente</option>
                    </select>
                </div>

                <div class="col-md-2 mb-3">
                    <label>Buscar</label>
                    <input type="text" name="buscar" class="form-control" value="{{ $filters['buscar'] }}" placeholder="Cliente, tel, factura">
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-primary">Filtrar</button>
                <a href="{{ route('admin.pagos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </div>
    </form>

    <div class="row mb-4">
        <div class="col-md mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <span class="text-muted">Pagos</span>
                    <h3>{{ $stats['cantidad'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <span class="text-muted">Total recibido</span>
                    <h3>C$ {{ number_format($stats['total'], 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <span class="text-muted">Efectivo</span>
                    <h3>C$ {{ number_format($stats['efectivo'], 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <span class="text-muted">Transferencia</span>
                    <h3>C$ {{ number_format($stats['transferencia'], 2) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <span class="text-muted">Credito</span>
                    <h3>C$ {{ number_format($stats['credito'], 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mb-3">Ventas a Credito Pendientes</h3>

    <div class="card border-0 shadow-sm mb-4">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Factura</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Total Pagado</th>
                        <th>Saldo</th>
                        <th>Mora</th>
                        <th>Abonar</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($ventasCredito as $venta)
                        <tr>
                            <td>{{ $venta->numero_factura }}</td>
                            <td>{{ $venta->cliente->nombre ?? 'Consumidor Final' }}</td>
                            <td>C$ {{ number_format($venta->total, 2) }}</td>
                            <td>C$ {{ number_format($venta->total_pagado, 2) }}</td>
                            <td>
                                <span class="{{ $venta->saldo > 0 ? 'text-danger' : 'text-success' }}">
                                    C$ {{ number_format($venta->saldo, 2) }}
                                </span>
                            </td>
                            <td>
                                @if($venta->dias_mora > 30 && $venta->saldo > 0)
                                    <span class="badge bg-danger">Mora {{ $venta->dias_mora }} dias</span>
                                @else
                                    <span class="text-muted">Sin mora</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.pagos.store') }}" method="POST" class="d-flex align-items-center gap-2">
                                    @csrf
                                    <input type="hidden" name="venta_id" value="{{ $venta->id }}">
                                    <input type="number" name="monto" placeholder="Abono" required class="form-control form-control-sm" style="width:120px;">
                                    <select name="metodo" class="form-select form-select-sm" style="width:150px;">
                                        <option value="efectivo">Efectivo</option>
                                        <option value="transferencia">Transferencia</option>
                                        <option value="tarjeta">Tarjeta</option>
                                    </select>
                                    <button class="btn btn-success btn-sm">Abonar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No hay ventas a credito pendientes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="mb-3">Historial de Pagos</h3>

    <div class="card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Venta</th>
                        <th>Cliente</th>
                        <th>Monto</th>
                        <th>Metodo</th>
                        <th>Tipo venta</th>
                        <th>Fecha pago</th>
                        <th>Estado</th>
                        <th>Saldo</th>
                        <th class="text-end">Accion</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pagos as $pago)
                        <tr>
                            <td>{{ $pago->id }}</td>
                            <td>#{{ $pago->venta_id }}</td>
                            <td>{{ $pago->venta->cliente->nombre ?? 'Consumidor final' }}</td>
                            <td>C$ {{ number_format($pago->monto, 2) }}</td>
                            <td>{{ ucfirst($pago->metodo) }}</td>
                            <td>{{ ucfirst($pago->venta->tipo_pago ?? 'N/A') }}</td>
                            <td>
                                {{ $pago->fecha_pago ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y H:i') : $pago->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td>
                                <span class="badge {{ $pago->venta->estado == 'pagada' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($pago->venta->estado) }}
                                </span>
                            </td>
                            <td>C$ {{ number_format($pago->venta->saldo, 2) }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.pagos.print', $pago->id) }}" class="btn btn-danger btn-sm">PDF</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">No hay pagos con esos filtros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $pagos->links() }}
    </div>

</div>
@endsection
