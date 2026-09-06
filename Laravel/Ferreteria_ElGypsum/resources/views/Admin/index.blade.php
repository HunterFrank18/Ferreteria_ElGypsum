@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel administrativo del Gypsum </h1>
@stop

@section('content')

<div class="card mb-3">
    <div class="card-body d-flex align-items-end gap-2 flex-wrap">

        <form action="{{ route('admin.caja.abrir') }}" method="POST" class="d-flex gap-2">
            @csrf
            <input type="number" name="monto_inicial"
                   placeholder="Monto inicial"
                   class="form-control"
                   style="width: 180px;">

            <button class="btn btn-success text-nowrap">
                🟢 Abrir caja
            </button>
        </form>

        <form action="{{ route('admin.caja.cerrar') }}" method="POST">
            @csrf
            <button class="btn btn-danger text-nowrap">
                🔴 Cerrar caja
            </button>
        </form>

    </div>
</div>

<a href="{{ route('admin.reportes.diario') }}" class="btn btn-info mb-3">
📊 Ver reporte diario
</a>

<div class="row">

<div class="col-md-3">
<div class="small-box bg-primary">
<div class="inner">
<h3>{{ $ventasHoy }}</h3>
<p>Ventas hoy</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="small-box bg-success">
<div class="inner">
<h3>C$ {{ number_format($ingresosHoy,2) }}</h3>
<p>Ingresos hoy</p>
</div>
</div>
</div>

<div class="col-md-3">
<div class="small-box bg-warning">
<div class="inner">
<h3>{{ $productosVendidosHoy }}</h3>
<p>Productos vendidos</p>
</div>
</div>
</div>

</div>




<div class="row">

<div class="col-lg-3 col-6">
<div class="small-box bg-info">
<div class="inner">

<h3>{{ \App\Models\Product::count() }}</h3>

<p>Productos registrados</p>

</div>

<div class="icon">
<i class="fas fa-box"></i>
</div>

<a href="{{ route('admin.products.index') }}" class="small-box-footer">
Ver productos <i class="fas fa-arrow-circle-right"></i>
</a>

</div>
</div>



<div class="col-lg-3 col-6">
<div class="small-box bg-success">
<div class="inner">

<h3>{{ \App\Models\Category::count() }}</h3>

<p>Categorías</p>

</div>

<div class="icon">
<i class="fas fa-tags"></i>
</div>

<a href="{{ route('admin.categories.index') }}" class="small-box-footer">
Ver categorías <i class="fas fa-arrow-circle-right"></i>
</a>

</div>
</div>



<div class="col-lg-3 col-6">
<div class="small-box bg-warning">
<div class="inner">

<h3>{{ \App\Models\ProductVariant::sum('stock')  }}</h3>

<p>Stock total</p>

</div>

<div class="icon">
<i class="fas fa-warehouse"></i>
</div>

<a href="{{ route('admin.products.index') }}" class="small-box-footer">
Ver inventario <i class="fas fa-arrow-circle-right"></i>
</a>

</div>
</div>



<div class="col-lg-3 col-6">
<div class="small-box bg-danger">
<div class="inner">

<h3>{{ \App\Models\Product::where('stock','<=',5)->count() }}</h3>

<p>Productos con stock bajo</p>

</div>

<div class="icon">
<i class="fas fa-exclamation-triangle"></i>
</div>

<a href="{{ route('admin.products.index') }}" class="small-box-footer">
Revisar <i class="fas fa-arrow-circle-right"></i>
</a>

</div>
</div>

</div>

<div class="card mt-4">
<div class="card-header">
<h3 class="card-title">🔥 Productos más vendidos</h3>
</div>

<div class="card-body">
<table class="table">
<thead>
<tr>
<th>Variante</th>
<th>Cantidad vendida</th>
</tr>
</thead>

<tbody>
@foreach($topProductos as $item)
<tr>
<td>
    {{ $item->variante->product->name ?? 'Producto' }} -
    {{ $item->variante->brand->name ?? 'Marca' }}
    <br>
    <small class="text-muted">{{ $item->variante->sku }}</small>
</td>
<td>{{ $item->total }}</td>
</tr>
@endforeach
</tbody>

</table>
</div>
</div>





<div class="card">

<div class="card-header">
<h3 class="card-title">Productos con poco inventario</h3>
</div>

<div class="card-body">

<table class="table table-bordered">

<thead>

<tr>
<th>Producto</th>
<th>Stock</th>
<th>Acción</th>
</tr>

</thead>

<tbody>

@foreach(\App\Models\Product::where('stock','<=5')->get() as $product)

<tr>

<td>{{ $product->name }}</td>

<td>
<span class="badge badge-danger">
{{ $product->stock }}
</span>
</td>

<td>

<a href="{{ route('admin.products.edit',$product->id) }}"
class="btn btn-warning btn-sm">

Editar

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

<h4>Clientes con deudas</h4>

@if($clientesMorosos->isEmpty())
    <p>No hay clientes morosos 🎉</p>
@else
    <ul>
        @foreach($clientesMorosos as $cliente)
            <li>{{ $cliente->nombre }}</li>
        @endforeach
    </ul>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ventas últimos 7 días</h3>
    </div>
    <div class="card-body">
        <canvas id="ventasChart"></canvas>
    </div>
</div>
@endsection


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
let ventas = @json($ventasSemana);
let labels = @json($dias);

new Chart(document.getElementById('ventasChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Ingresos (C$)',
            data: ventas,
            borderWidth: 3,
            tension: 0.4,
            fill: true,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return 'C$ ' + context.raw.toLocaleString();
                    }
                }
            }
        }
    }
});
</script>
@stop
