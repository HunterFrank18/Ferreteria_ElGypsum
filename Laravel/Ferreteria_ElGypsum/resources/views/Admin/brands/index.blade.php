

@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
<h1>Listado de Marcas</h1>

<a href="{{ route('admin.brands.create') }}" class="btn btn-primary mb-2">
Crear Marca
</a>

@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<table id="tablaMarcas" class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th width="200">Acciones</th>
</tr>
</thead>

<tbody>

@foreach($brands as $brand)

<tr>

<td>{{ $brand->id }}</td>

<td>{{ $brand->name }}</td>

<td>

<a href="{{ route('admin.brands.edit',$brand) }}" class="btn btn-warning btn-sm">
Editar
</a>

<form action="{{ route('admin.brands.destroy',$brand) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Eliminar
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@stop
@section('js')

<script>

$(document).ready(function() {

$('#tablaMarcas').DataTable({
"pageLength": 5,
"language": {
"url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
}
});

});

</script>

@stop
