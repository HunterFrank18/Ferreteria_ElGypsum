@extends('layouts.admin')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
    <div>
        <h3 class="mb-1">Usuarios y roles</h3>
        <p class="text-muted mb-0">Asigna roles y cambia contrasenas de usuarios.</p>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">
        Volver al panel
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <strong>Revisa estos datos:</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-header bg-dark text-white">
        Usuarios registrados
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol actual</th>
                    <th>Asignar rol</th>
                    <th>Cambiar contrasena</th>
                    <th class="text-end">Accion</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>
                            <strong>{{ $user->name }}</strong>
                        </td>

                        <td>{{ $user->email }}</td>

                        <td>
                            @forelse($user->roles as $role)
                                <span class="badge bg-primary">{{ ucfirst($role->name) }}</span>
                            @empty
                                <span class="badge bg-secondary">Sin rol</span>
                            @endforelse
                        </td>

                        <td style="min-width: 210px;">
                            <form id="role-form-{{ $user->id }}" action="{{ route('admin.users.roles.update', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <select name="role" class="form-control">
                                    <option value="" @selected($user->roles->isEmpty())>
                                        Sin rol
                                    </option>

                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </td>

                        <td style="min-width: 280px;">
                            <form id="password-form-{{ $user->id }}" action="{{ route('admin.users.password.update', $user) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <div class="input-group input-group-sm mb-2">
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control"
                                        placeholder="Nueva contrasena"
                                        minlength="6"
                                    >

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="const input = this.previousElementSibling; input.type = input.type === 'password' ? 'text' : 'password';"
                                    >
                                        Ver
                                    </button>
                                </div>

                                <div class="input-group input-group-sm">
                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control"
                                        placeholder="Confirmar contrasena"
                                        minlength="6"
                                    >

                                    <button
                                        type="button"
                                        class="btn btn-outline-secondary"
                                        onclick="const input = this.previousElementSibling; input.type = input.type === 'password' ? 'text' : 'password';"
                                    >
                                        Ver
                                    </button>
                                </div>
                            </form>
                        </td>

                        <td class="text-end">
                            <button class="btn btn-success btn-sm mb-1" form="role-form-{{ $user->id }}">
                                Guardar rol
                            </button>

                            <button class="btn btn-warning btn-sm mb-1" form="password-form-{{ $user->id }}">
                                Cambiar clave
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $users->links() }}
</div>

<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-dark text-white">
        Gestionar roles
    </div>

    <div class="card-body">
        <form action="{{ route('admin.roles.store') }}" method="POST" class="row g-2 mb-4">
            @csrf

            <div class="col-md-8">
                <label class="form-label">Nuevo rol</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Ejemplo: cajero"
                    required
                >
            </div>

            <div class="col-md-4 d-flex align-items-end">
                <button class="btn btn-primary w-100">
                    Crear rol
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Usuarios asignados</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($roles as $role)
                        @php
                            $usersCount = $role->users()->count();
                            $isAdmin = $role->name === 'admin';
                        @endphp

                        <tr>
                            <td style="min-width: 240px;">
                                <form id="role-update-{{ $role->id }}" action="{{ route('admin.roles.update', $role) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ $role->name }}"
                                        {{ $isAdmin ? 'readonly' : '' }}
                                    >
                                </form>
                            </td>

                            <td>
                                <span class="badge {{ $usersCount > 0 ? 'bg-info text-dark' : 'bg-secondary' }}">
                                    {{ $usersCount }}
                                </span>
                            </td>

                            <td class="text-end">
                                <button
                                    class="btn btn-success btn-sm"
                                    form="role-update-{{ $role->id }}"
                                    {{ $isAdmin ? 'disabled' : '' }}
                                >
                                    Guardar
                                </button>

                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Eliminar este rol?')"
                                        {{ $isAdmin || $usersCount > 0 ? 'disabled' : '' }}
                                    >
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                No hay roles registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="alert alert-light border mt-3 mb-0">
            <strong>Nota:</strong> las contrasenas guardadas no se pueden ver porque Laravel las encripta. Desde aqui solo puedes escribir una nueva y mostrarla antes de guardarla.
        </div>
    </div>
</div>
@endsection
