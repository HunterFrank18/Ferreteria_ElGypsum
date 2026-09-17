@extends('adminlte::page')

@section('title', 'Historial Cliente')

@section('content')

<h3>Cliente: {{ $cliente->nombre }}</h3>

<hr>

<h4>Resumen</h4>

@php
$totalCompras = $cliente->ventas->sum('total');
$totalPagado = $cliente->pagos->sum('monto');
$saldo = $totalCompras - $totalPagado;
@endphp

<ul>
    <li><strong>Total Comprado:</strong> C$ {{ number_format($totalCompras,2) }}</li>
    <li><strong>Total Pagado:</strong> C$ {{ number_format($totalPagado,2) }}</li>
    <li><strong>Saldo Pendiente:</strong>
        <span class="{{ $saldo > 0 ? 'text-danger' : 'text-success' }}">
            C$ {{ number_format($saldo,2) }}
        </span>
    </li>
</ul>

<hr>

<h4>Historial de Pagos</h4>

<table class="table table-bordered">
<thead>
<tr>
    <th>Venta</th>
    <th>Monto</th>
    <th>Método</th>
    <th>Fecha</th>
</tr>
</thead>

<tbody>

@forelse($cliente->pagos as $pago)
<tr>
    <td>#{{ $pago->venta_id }}</td>
    <td>C$ {{ number_format($pago->monto,2) }}</td>
    <td>{{ ucfirst($pago->metodo) }}</td>
    <td>{{ $pago->created_at->format('d/m/Y') }}</td>
</tr>
@empty
<tr>
<td colspan="4">No hay pagos registrados</td>
</tr>
@endforelse

</tbody>
</table>

<hr>

<h4>Ventas del Cliente</h4>

<table class="table table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Total</th>
    <th>Pagado</th>
    <th>Saldo</th>
    <th>Estado</th>
</tr>
</thead>

<tbody>

@foreach($cliente->ventas as $venta)

@php
$pagado = $venta->pagos->sum('monto');
$saldoVenta = $venta->total - $pagado;
@endphp

<tr>
<td>#{{ $venta->id }}</td>

<td>C$ {{ number_format($venta->total,2) }}</td>

<td>C$ {{ number_format($pagado,2) }}</td>

<td>
<span class="{{ $saldoVenta > 0 ? 'text-danger' : 'text-success' }}">
C$ {{ number_format($saldoVenta,2) }}
</span>
</td>

<td>
<span class="badge {{ $venta->estado == 'pagada' ? 'bg-success' : 'bg-warning' }}">
{{ ucfirst($venta->estado) }}
</span>
</td>

</tr>

@endforeach

</tbody>
</table>

@endsection
