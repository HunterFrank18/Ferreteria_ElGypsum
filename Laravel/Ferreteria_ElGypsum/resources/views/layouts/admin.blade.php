<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Panel Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f4f6f9;">

<nav class="navbar navbar-dark bg-dark">

<div class="container-fluid">

<a class="navbar-brand" href="{{ route('admin.dashboard') }}">
Panel de Administración
</a>

<a href="{{ route('home') }}" class="btn btn-outline-light btn-sm">
Ir a la tienda
</a>

<a href="{{ route('admin.solicitudes.index') }}" class="btn btn-warning btn-sm">
Solicitudes
</a>

</div>

<li class="nav-item dropdown">

<a class="nav-link" data-toggle="dropdown" href="#">

<i class="fas fa-bell"></i>

<span class="badge badge-danger navbar-badge">
{{ \App\Models\Cliente::morosos()->count() }}
</span>

</a>


<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

<span class="dropdown-item dropdown-header">
Clientes con deuda
</span>

<div class="dropdown-divider"></div>

@foreach(\App\Models\Cliente::morosos()->take(5)->get() as $cliente)

<a href="{{ route('admin.clientes.show',$cliente->id) }}"
class="dropdown-item">

<i class="fas fa-user text-danger"></i>
{{ $cliente->nombre }}

</a>

<div class="dropdown-divider"></div>

@endforeach

</div>

</li>

</nav>

<div class="container mt-4">

@yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.form-delete').forEach(form => {

form.addEventListener('submit', function(e){

e.preventDefault();

Swal.fire({

title:'¿Eliminar producto?',
text:'No podrás revertir esto',
icon:'warning',
showCancelButton:true,
confirmButtonText:'Sí eliminar',
cancelButtonText:'Cancelar'

}).then((result)=>{

if(result.isConfirmed){
form.submit();
}

});

});

});

<audio id="alertSound">
    <source src="{{ asset('sounds/alert.mp3') }}" type="audio/mpeg">
</audio>


document.addEventListener("DOMContentLoaded", function(){

    let morosos = {{ \App\Models\Cliente::morosos()->count() }};

    if(morosos > 0){
        document.getElementById("alertSound").play();
    }

});


</script>



</body>

</html>
