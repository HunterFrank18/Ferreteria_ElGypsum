@extends('layouts.admin')

@section('content')

<div class="container">

<h2>Registrar Pago</h2>

<form action="{{ route('admin.pagos.store') }}" method="POST">

@csrf

<select name="venta_id" class="form-control mb-3">
    <option>Seleccione Venta</option>

    @foreach($ventas as $venta)
        <option value="{{ $venta->id }}">
            Venta #{{ $venta->id }} - C$ {{ $venta->total }}
        </option>
    @endforeach

</select>

<input type="number"
name="monto"
step="0.01"
placeholder="Monto"
class="form-control mb-3">

<select name="metodo" class="form-control mb-3">
    <option value="efectivo">Efectivo</option>
    <option value="transferencia">Transferencia</option>
    <option value="tarjeta">Tarjeta</option>
</select>

<input type="date"
name="fecha_pago"
class="form-control mb-3">

<button class="btn btn-success">
Guardar Pago
</button>

</form>

</div>

@endsection
