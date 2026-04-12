<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
     <!-- <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}"> -->
 <link rel="stylesheet" href="{{ asset('css/bano.css') }}">
    <title>Bienvenido a la categoria Baño</title>
</head>

<body>

<style>
        body {
            background: url("{{ asset('Fondos/ferreteria16.jpg') }}");
            min-height: 100vh;
            width: 100%;
            background-size: contain;
            background-repeat: repeat-y;

       }
       .pricing-header{
        color: antiquewhite;
       }
    </style>

    <header>
        <div class="container">
            <div class="row align-items-stretch justify-content-between">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="{{ url('/index') }}">Ferreteria El Gypsum  <i class="fa-solid fa-shower" style="color: #63E6BE;"></i></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown">
                                <img src="{{ asset('img/cart.jpeg') }}" class="nav-link dropdown-toggle img-fluid" height="70px"
                                    width="70px" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"></img>
                                <div id="carrito" class="dropdown-menu" aria-labelledby="navbarCollapse">
                                    <table id="lista-carrito" class="table">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>


                                    <a href="#" id="vaciar-carrito" class="btn btn-primary btn-block">Vaciar Carrito</a>
                                    <a href="#" id="procesar-pedido" class="btn btn-danger btn-block">Procesar
                                        Compra</a>


                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 class="display-4 mt-4">Lista de Productos</h1>
            <p class="lead">Selecciona uno de nuestros productos y accede a un descuento</p>
        </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Asiento Alargado</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/asiento_alargado.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>
                            <li>FOSET</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Asiento Redondo</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/asiento_normal.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>
                            <li>FOSET</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Barra de Seguridad</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/barra_seguridad.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>BOXER</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Boya Tanque de Agua</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/BOYA-TANGUE-DE-AGUA-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>GENERICO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Brazo para Ducha</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/BRAZO-PARA-DUCHA-LORENZETTY-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>AQUAFINA</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cepillo Para Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/cepillo_inodoro.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GENERICO</li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cinta de Teflon</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/CINTA-TEFLON-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>3M</li>
                            <li>COFLEX</li>
                            <li>GENERICO</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Coladera Metal Cuadrada</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/coladera_metal.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>BOXER TOOLS</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Coladera Metal Cuadrada Negra</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/coladera_negra.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>BOXER TOOLS</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>






            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Coladera Desague Redonda</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/COLADERA-DE-DESAGUE-3-FOSET-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Desatorador de Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/destapador_inodoro.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>DEMONIO ROJO</li>
                            <li>FURIOSO</li>
                            <li>EL DRAGON</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Destaqueador de Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/DESTAQUEADOR-DE-INODOROS-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GENERICO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Ducha Cromada</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/ducha_cromada.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>BOXER TOOLS</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Ducha Electrica</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/ducha_electrica.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Ducha Metalica Con Brazo</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/DUCHA-METALICA-CON-BRAZO-GRIVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Empaque De Cera</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/EMPAQUE-CERA-GRIVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Espuma De Polyuretano Expansiva</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/ESPUMA-DE-POLYURETANO-EXPANSIVA-LANCO-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>LANCO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Flange de Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/FLANGE-INODORO-COFLEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>COFLEX</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Flotador Electrico</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/FLOTADOR-ELECTRO-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>FOSET</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Inodoro Aldosa</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/Inodoro_Aldosa.jpeg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>ALDOSA</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Inodoro de Push</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/Inodoro_Push.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Inodoro Standard</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/Inodoro_ecoline.png') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>ECOLINE</li>
                            <li>INCESA STANDARD</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tornillos De Tanque de Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/JUEGO-TORNILLOS-PARA-INODORO-GRIVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>COFLEX</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Kit De Inodoro Cato</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/KIT_CATO.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>CATO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Kit de Inodoro Standard</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/kit_inodoro.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>AQUAFINA</li>
                            <li>GRIVEN</li>
                            <li>COFLEX</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Kit De Inodoro Push</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/KIT-INODORO de push.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/LAVAMANO.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>ECOLINE</li>
                            <li>ASTRA</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>
        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Pase Metalica</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/llave_pase_emt.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Abasto Doble Para Pantry</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/LLAVE-ABASTO-ANGULAR-DOBLE-PANTRY-BRASSCRAFT-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>FOSET</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Angulo Sencilla Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/LLAVE-ABASTO-ANGULAR-LAVAMANO-BRASSCRAFT-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Campana Para Ducha</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/LLAVE-PARA-DUCHA-CAMPANA-GRVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Ducha Cruzeta</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/LLAVE-PARA-DUCHA-CRUZETA-GRIVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Manecilla Para Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/MANECILLA.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Manguera De Inodoro</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/manguera_inodoro.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>COFLEX</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Manguera De Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/MANGUERA-LAVABO-FREGADERO-VINIL-COFLEX-1-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>COFLEX</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Manguera Doble Para Lavamano/Pantry</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/MANGUERA-T-LAVABO-FREGADERO-COFLEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>COFLEX</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>
        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa Para Pantry</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/PANTRY-TRAMPA-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Pegamento PVC Durman</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/PEGAMENTO-PVC-DURMAN_1octavo.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/16</li>
                            <li>1/32</li>
                            <li>1/8</li>
                            <li>1/4</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Pera Rana</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/pera_rana.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Regadera Cuadrada</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/regadera_cuadrada_aquafina.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>AQUAFINA</li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Regadera Redonda</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/regadera_redonda_aquafina.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Sonda Para Destaquear</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/sonda.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Soporte Para Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/SOPORTE-PARA-LAVAMANO-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa De Desague</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/trampa_desague.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa Flexible Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/TRAMPA-FLEXIBLE-LAVAMANO-FOSET-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>

        <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa De Lavamano Cromada</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/TRAMPA-LAVAMANO-CROMADA-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tubo Potable PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/TUBO-AGUA-POTABLE-PVC.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                            <li>2"</li>
                            <li>3"</li>
                            <li>4"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Union de Tope</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/union_tope.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>DURMAN</li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Union Maleable</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/UNION-DE-REPARACION-PVC-1-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Pase Plastica</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/VALVULA-BOLA-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Check Horizontal</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/VALVULA-CHECK-HORIZONTAL-1-2-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Llave Check Vertical</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/VALVULA-CHECK-VERTICAL-TRUPER-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa De Desague</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/trampa_desague.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>GRIVEN</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa Flexible Lavamano</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Baño/TRAMPA-FLEXIBLE-LAVAMANO-FOSET-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>FOSET</li>
                            <li>GRIVEN</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>

            </div>


        </div>
    </main>

       <script src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('js/carrito.js')}}"></script>
    <script src="{{ asset('js/pedido.js')}}"></script>


</body>

</html>
