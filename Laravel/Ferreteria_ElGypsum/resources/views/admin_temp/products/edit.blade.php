@extends('layouts.admin')

@section('content')

<div class="container mt-4">

<div class="card shadow border-0">

<div class="card-header bg-warning">
<h4>Editar Producto</h4>
</div>

<div class="card-body">

<form action="{{ route('admin.products.update',$product->id) }}" method="POST" enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="row">

<div class="col-md-6 mb-3">
<label>Nombre</label>
<input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
</div>

<div class="col-md-6 mb-3">
<label>Categoría</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}"
@if($product->category_id == $category->id) selected @endif>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-4 mb-3">
<label>Precio</label>
<input type="number" name="price" step="0.01" class="form-control" value="{{ $product->price }}">
<div class="form-text text-muted">Este valor es solo referencia. Si el producto tiene marcas/variantes, el precio real se gestiona en Variantes.</div>
</div>

<div class="col-md-4 mb-3">
<label>Stock</label>
<input type="number" name="stock" class="form-control" value="{{ $product->stock }}">
<div class="form-text text-muted">Este stock es general. Las cantidades por marca se administran en Variantes.</div>
</div>

<div class="col-md-4 mb-3">
<label>Nueva Imagen</label>
<input type="file" name="image" class="form-control">
</div>

@if($product->image)

<div class="col-md-12 mb-3 text-center">

<img src="{{ asset('storage/'.$product->image) }}" style="max-height:120px">

</div>

@endif

<div class="col-md-12 mb-3">
<label>Descripción</label>
<textarea name="description" class="form-control">{{ $product->description }}</textarea>
</div>

</div>

<div class="d-flex justify-content-end gap-2">

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
Cancelar
</a>

<button class="btn btn-success">
Actualizar Producto
</button>

</div>

</form>

</div>

</div>

</div>

@endsection
