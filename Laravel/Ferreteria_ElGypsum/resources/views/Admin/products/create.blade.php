@extends('layouts.admin')

@section('content')

<div class="container mt-4">

<div class="card shadow border-0">

<div class="card-header bg-dark text-white">
<h4>Crear Producto</h4>
</div>

<div class="card-body">

@if ($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Nombre</label>
<input type="text" name="name" class="form-control" placeholder="Ej: Taladro Bosch" required>
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Categoría</label>
<select name="category_id" class="form-control" required>
<option value="">Seleccione</option>
@foreach($categories as $category)
<option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach
</select>
</div>

<div class="col-md-4 mb-3">
<label class="form-label">Precio</label>
<input type="number" name="price" step="0.01" class="form-control">
<div class="form-text text-muted">Este valor es solo referencia. Si el producto tiene marcas/variantes, el precio real se gestiona en Variantes.</div>
</div>

<div class="col-md-4 mb-3">
<label class="form-label">Stock</label>
<input type="number" name="stock" class="form-control">
<div class="form-text text-muted">Este stock es general. Las cantidades por marca se administran en Variantes.</div>
</div>

<div class="col-md-4 mb-3">
<label class="form-label">Imagen</label>
<input type="file" name="image" class="form-control" id="imageInput">
</div>

<div class="col-md-12 mb-3 text-center">
<img id="preview" style="max-height:150px; display:none;">
</div>

<div class="col-md-12 mb-3">
<label class="form-label">Descripción</label>
<textarea name="description" class="form-control"></textarea>
</div>

</div>

<div class="d-flex justify-content-end gap-2">

<a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
Cancelar
</a>

<button class="btn btn-success">
Guardar Producto
</button>

</div>

</form>

</div>

</div>

</div>

<script>

document.getElementById('imageInput').addEventListener('change', function(event){

const preview = document.getElementById('preview');

preview.src = URL.createObjectURL(event.target.files[0]);

preview.style.display = 'block';

});

</script>

@endsection
