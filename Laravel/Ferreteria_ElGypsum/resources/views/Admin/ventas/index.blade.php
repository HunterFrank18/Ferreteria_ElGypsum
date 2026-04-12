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
<th>Estado</th>
</tr>
</thead>

<tbody>

@foreach($ventas as $v)

<tr>
<td>{{ $v->numero_factura }}</td>
<td>{{ $v->cliente->nombre ?? 'Consumidor Final' }}</td>
<td>${{ $v->total }}</td>
<td>{{ $v->estado }}</td>
</tr>

@endforeach

</tbody>

</table>

{{ $ventas->links() }}

@endsection
