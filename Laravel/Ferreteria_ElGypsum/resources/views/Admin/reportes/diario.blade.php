@extends('adminlte::page')

@section('content')

<h3>📊 Reporte del día</h3>

<p><strong>Total vendido:</strong> C$ {{ number_format($ventas->sum('total'),2) }}</p>

<p><strong>Ventas contado:</strong>
C$ {{ $ventas->where('tipo_pago','contado')->sum('total') }}
</p>

<p><strong>Ventas crédito:</strong>
C$ {{ $ventas->where('tipo_pago','credito')->sum('total') }}
</p>

<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Cliente</th>
<th>Total</th>
<th>Estado</th>
</tr>
</thead>

<tbody>
@foreach($ventas as $v)
<tr>
<td>{{ $v->id }}</td>
<td>{{ $v->cliente->nombre ?? 'General' }}</td>
<td>C$ {{ $v->total }}</td>
<td>{{ $v->estado }}</td>
</tr>
@endforeach
</tbody>

</table>

@endsection
