@extends('layouts.admin')

@section('content')

<div class="container mt-4">

<div class="card shadow-lg border-0">

<div class="card-header bg-dark text-white">
<h4>Crear Categoría</h4>
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

<form action="{{ route('admin.categories.store') }}" method="POST">

@csrf

<div class="mb-3">

<label class="form-label">Nombre de la categoría</label>

<input
type="text"
name="name"
id="name"
class="form-control"
placeholder="Ej: Herramientas"
required
>

</div>

<div class="mb-3">

<label class="form-label">Slug</label>

<input
type="text"
id="slug"
class="form-control"
readonly
>

<small class="text-muted">
URL: /categoria/<span id="slugPreview"></span>
</small>

</div>

<div class="d-flex justify-content-end gap-2">

<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
Cancelar
</a>

<button class="btn btn-success">
Guardar categoría
</button>

</div>

</form>

</div>
</div>

</div>

<script>

const nameInput = document.getElementById('name');
const slugInput = document.getElementById('slug');
const slugPreview = document.getElementById('slugPreview');

nameInput.addEventListener('keyup', function(){

let slug = nameInput.value
.toLowerCase()
.replace(/ /g,'-')
.replace(/[^\w-]+/g,'');

slugInput.value = slug;
slugPreview.innerText = slug;

});

</script>

@endsection
