@extends('adminlte::page')

@section('title','Ventas')

@section('content')

<h3>Listado de ventas</h3>

<table class="table table-bordered">
<thead>
<tr>
<th>Factura</th>
<th>Cliente</th>
<th>Total</th>
<th>Total Pagado</th>
<th>Saldo</th>
<th>Mora</th>
<th>Estado</th>
</tr>
</thead>

<tbody>


@foreach($ventas as $v)
<tr>
<td>{{ $v->numero_factura }}</td>
<td>{{ $v->cliente->nombre ?? 'Consumidor Final' }}</td>
<td>${{ $v->total }}</td>
<td> C$ {{ number_format($v->total_pagado,2) }} </td>
<td>
    <span class="{{ $v->saldo > 0 ? 'text-danger' : 'text-success' }}">
        C$ {{ number_format($v->saldo,2) }}
    </span>
</td>
<td>
    @if($v->dias_mora > 30 && $v->saldo > 0)
    <span class="badge bg-danger">
        Mora {{ $v->dias_mora }} días
    </span>
    @endif
</td>
<td>{{ $v->estado }}</td>
</tr>
<tr>
	<td colspan="7">
		<form action="{{ route('admin.pagos.store') }}" method="POST" class="d-flex align-items-center gap-2">
			@csrf
			<input type="hidden" name="venta_id" value="{{ $v->id }}">
			<input type="number" name="monto" placeholder="Abono" required class="form-control form-control-sm" style="width:120px;display:inline-block">
			<select name="metodo" class="form-select form-select-sm" style="width:140px;display:inline-block">
				<option value="efectivo">Efectivo</option>
				<option value="transferencia">Transferencia</option>
			</select>
			<button class="btn btn-success btn-sm">Abonar</button>
		</form>
	</td>
</tr>
@endforeach

</tbody>

</table>

{{ $ventas->links() }}

@endsection
