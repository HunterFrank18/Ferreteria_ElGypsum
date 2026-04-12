@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<h1>Clientes</h1>
<a href="{{ route('admin.clientes.create') }}" class="btn btn-primary mb-2">
+ Nuevo Cliente
</a>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div class="card">
<div class="card-body">

<table class="table table-hover">
<thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Teléfono</th>
    <th>Dirección</th>
    <th>Límite Crédito</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>

@foreach($clientes as $cliente)

<tr>
    <td>{{ $cliente->id }}</td>

    <td>{{ $cliente->nombre }}</td>

    <td>{{ $cliente->telefono }}</td>

    <td>{{ $cliente->direccion }}</td>

    <td>C$ {{ number_format($cliente->limite_credito,2) }}</td>

    <td>
        @if($cliente->estado == 'activo')
            <span class="badge bg-success">Activo</span>
        @else
            <span class="badge bg-danger">Inactivo</span>
        @endif
    </td>

    <td>

        <a href="{{ route('admin.clientes.edit',$cliente->id) }}"
           class="btn btn-warning btn-sm">
           Editar
        </a>

        <form action="{{ route('admin.clientes.destroy',$cliente->id) }}"
              method="POST"
              class="d-inline">

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

<div class="mt-3">
{{ $clientes->links() }}
</div>

</div>
</div>

@stop
@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.form-delete').forEach(form => {
    form.addEventListener('submit', function(e){
        e.preventDefault();

        Swal.fire({
            title: '¿Eliminar?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
});
</script>

@stop
