<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}"> <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}"> <!-- JS -->
    <script src="{{ asset('js/carrito.js') }}" defer></script>
    <title>Pagina de Inicio</title>
</head>

<body>
    <style>
        body {
            background: url("{{ asset('Fondos/ferreteria.jpg') }}");
            background-repeat: ;
            background-size: cover;
        }

        .pricing-header {
            color: antiquewhite;
        }
    </style>
    <header>
        <aside id="imagen"> <img src="{{ asset('Fondos/Logo Ferreteria El gypsum.png') }}" alt="Logo"
                width="50%"> </aside>
        <nav>

<ul class="menu-horizontal">

<li>
<a href="{{ url('/lomasnuevo') }}">Lo más nuevo</a>
</li>

@auth
<li>
    <a href="{{ route('admin.dashboard') }}">Panel Admin</a>
</li>
<li>
    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">Cerrar Sesión</button>
    </form>
</li>
@else
<li>
    <a href="{{ route('login') }}">Iniciar Sesión</a>
</li>
<li>
    <a href="{{ route('register') }}">Registrarse</a>
</li>
@endauth

<li>

<a href="#">Categorias</a>

<ul class="menu-vertical">

<li>
<a href="{{ url('energy') }}">Electricidad <i class="fa-regular fa-lightbulb"></i></a>
</li>

<li>
<a href="{{ url('/bano') }}">Baño <i class="fa-solid fa-shower"></i></a>
</li>

<li>
<a href="{{ url('/plumb') }}">Plomeria <i class="fa-solid fa-toilet"></i></a>
</li>

<li>
<a href="{{ url('security') }}">Seguridad <i class="fa-solid fa-lock"></i></a>
</li>

<li>
<a href="{{ url('/tools') }}">Herramientas <i class="fa-solid fa-screwdriver-wrench"></i></a>
</li>

</ul>

</li>

<li>
<a href="{{ url('/soporte') }}">Soporte</a>
</li>

</ul>

</nav>

    </header>
    <div class="parrafo">
        <h1 class="texto">TIENES DELIVERY GRATIS EN TODOS TUS PEDIDOS<br>HAZ CLICK EN EL ICONO DE WHATSAPP PARA
            REALIZAR EL TUYO AHORA</h1>
        <h1 class="texto"></h1>
        <p>Debug: {{ Auth::check() ? 'Logueado' : 'No logueado' }}</p>
    </div>
</body>
<footer class="footer">
    </div>
    <div class="footer-links">
        <!-- <img id="im" src="{{ asset('images/LOGO TRANS.png') }}" alt="" width="100px" style="text-align: center;"> -->
    </div>
    <div clas="containerr">
        <div class="footer-row">
            <div class="footer-links">
                <h4>Direccion</h4>
                <ul style="list-style: none;">
                    <li>Mercado Ivan Montenegro, En el parqueo, contiguo al puesto</li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Contactanos</h4>
                <ul style="list-style: none;">
                    <li><a href="https://maps.app.goo.gl/NUgpKXqMRv6WZPZo7">Mercado Ivan Montenegro</a></li>
                    <li><a href="https://wa.me/505865023595">+505 8650 2359</a></li>
                    <li><a href="mailto:elgypsum@gmail.com">elgypsum@gmail.com</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Siguenos</h4>
                <div class="social-link"> <a href="#"><i class="fab fa-facebook-f"></i></a> <a
                        href="https://wa.me/505865023595"><i class="fab fa-whatsapp"></i></a> </div>
            </div>
        </div>
    </div>
</footer>
</div>

</html>
