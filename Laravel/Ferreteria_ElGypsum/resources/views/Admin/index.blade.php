@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel administrativo del Gypsum </h1>
@stop

@section('content')

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

@endsection


@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
