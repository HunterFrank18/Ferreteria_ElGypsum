@extends('layouts.admin')

@section('content')

<div class="container mt-4">

<div class="card shadow-lg border-0">

<div class="card-header bg-warning text-dark">
<h4>Editar Categoría</h4>
</div>

<div class="card-body">

<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">

<label class="form-label">Nombre</label>

<input
type="text"
name="name"
id="name"
class="form-control"
value="{{ $category->name }}"
required
>

</div>

<div class="mb-3">

<label class="form-label">Slug</label>

<input
type="text"
id="slug"
class="form-control"
value="{{ $category->slug }}"
readonly
>

<small class="text-muted">
URL: /categoria/<span id="slugPreview">{{ $category->slug }}</span>
</small>

</div>

<div class="d-flex justify-content-end gap-2">

<a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
Cancelar
</a>

<button class="btn btn-success">
Actualizar categoría
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
