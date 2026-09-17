@extends('layouts.admin')

@section('content')

<div class="container mt-4">

<h2 class="mb-4">Productos</h2>


@if(session('success'))

<div class="alert alert-success">
{{ session('success') }}
</div>

@endif


<div class="d-flex justify-content-between mb-3">

<a href="{{ route('admin.products.create') }}" class="btn btn-primary">
Crear Producto
</a>


<form method="GET">

<input type="text"
name="search"
value="{{ $search }}"
placeholder="Buscar producto..."
class="form-control">

</form>

</div>


<div class="card shadow">

<div class="table-responsive">

<table class="table table-hover">

<thead class="table-dark">

<tr>

<th>Imagen</th>
<th>Nombre</th>
<th>Categoría</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>

</tr>

</thead>


<tbody>

@foreach($products as $product)

<tr>

<td>

@if($product->image)
<img src="{{ asset('storage/'.$product->image) }}" style="height:50px">
@else
<img src="https://via.placeholder.com/50">
@endif

</td>

<td>{{ $product->name }}</td>

<td>{{ $product->category->name ?? 'Sin categoría' }}</td>

<td>
    @if($product->variants->count())
        C$ {{ number_format($product->variants->min('price'), 2) }}
        @if($product->variants->count() > 1)
            - C$ {{ number_format($product->variants->max('price'), 2) }}
        @endif
    @else
        C$ {{ number_format($product->price, 2) }}
    @endif
</td>

<td>
    @php
        $stock = $product->variants->count() ? $product->variants->sum('stock') : $product->stock;
    @endphp

    @if($stock <= 0)
        <span class="badge bg-danger">Sin stock ({{ $stock }})</span>
    @elseif($stock <= 5)
        <span class="badge bg-danger">⚠ Stock Bajo ({{ $stock }})</span>
    @elseif($stock <= 10)
        <span class="badge bg-warning text-dark">Stock Medio ({{ $stock }})</span>
    @else
        <span class="badge bg-success">Stock OK ({{ $stock }})</span>
    @endif
</td>

<td>

<a href="{{ route('admin.variants.index', ['product_id' => $product->id]) }}" class="btn btn-sm btn-info">
Variantes
</a>
<a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-sm btn-warning">
Editar
</a>

<form action="{{ route('admin.products.destroy',$product->id) }}"
method="POST"
class="d-inline form-delete">

@csrf
@method('DELETE')

<button class="btn btn-sm btn-danger">
Eliminar
</button>

</form>

</td>

</tr>

@endforeach


</tbody>

</table>

</div>

</div>


<div class="mt-3">

{{ $products->links() }}

</div>


</div>

@endsection
