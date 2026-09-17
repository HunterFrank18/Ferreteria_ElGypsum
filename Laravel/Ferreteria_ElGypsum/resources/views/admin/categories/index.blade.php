
@extends('adminlte::page')
@section('content')

<div class="container mt-4">

    <h1 class="mb-4">Listado de Categorías</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">
        Crear categoría
    </a>

    <table class="table table-bordered table-striped">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th width="200">Acciones</th>
            </tr>
        </thead>

        <tbody>

        @foreach($categories as $category)

            <tr>
                <td>{{ $category->id }}</td>

                <td>{{ $category->name }}</td>

                <td>

                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline-block">

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

</div>

@endsection
