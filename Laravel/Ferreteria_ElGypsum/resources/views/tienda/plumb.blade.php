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
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/plomeria.css') }}">
    <title>Bienvenido a la categoria Plomeria</title>
</head>

<body>

<style>
        body {
            background: url("{{ asset('Fondos/ferreteria6.jpg') }}");
            min-height: 100vh;
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
                    <a class="navbar-brand" href="{{ url('/index') }}">Ferreteria El Gypsum <i class="fa-solid fa-toilet" style="color: #74C0FC;"></i></a>
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
                        <h4 class="my-0 font-weight-bold">Adaptador Hembra PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/ADAPTADOR-HEMBRA-PVC-300x300.jpg') }}" class="card-img-top">
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
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Adaptador Macho PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/ADAPTADOR-MACHO-PVC-300x300.jpg') }}" class="card-img-top">
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
                        <h4 class="my-0 font-weight-bold">Codo Liso PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/CODO-PVC-AGUA-POTABLE-1-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Codo Mixto PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/CODO-PVC-AGUA-POTABLE-1-300x300.jpg') }}" class="card-img-top">
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
                        <h4 class="my-0 font-weight-bold">Tee Lisa PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TEE-PVC-POTABLE-300x300.jpg') }}" class="card-img-top">
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
                        <h4 class="my-0 font-weight-bold">Tee Mixta PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TEE-PVC-POTABLE-300x300.jpg') }}" class="card-img-top">
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

              <div class="container" id="lista-productos">

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tapo Macho PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TAPON-MACHO-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Union Lisa PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TAPON-HEMBRA-LISO-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Union Mixta PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/UNION-LISA-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>1/2"</li>
                            <li>3/4"</li>
                            <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>




        </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tapon Hembra Liso PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TAPON-HEMBRA-LISO-PVC-300x300.jpg') }}" class="card-img-top">
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
                        <h4 class="my-0 font-weight-bold">Tapon Hembra con Rosca PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TAPON-HEMBRA-CON-ROSCA-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                             <li></li>
                             <li>1/2"</li>
                             <li>3/4"</li>
                             <li>1"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Tee Sanitaria</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TEE-PVC-SANITARIA-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>2"</li>
                            <li>3"</li>
                            <li>4"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Trampa Sanitaria</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/TRAMPA-SANITARIA-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>2"</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Yee Sanitaria</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/YEE-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>3"</li>
                            <li>4"</li>
                            <li>2"</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Reductor PVC</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/REDUCTOR-PVC-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>3/4 a 1/2</li>
                            <li>1 a 1/2</li>
                            <li>4 a 3</li>
                            <li>Todas las medidas</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Terminal de Manguera Metalico</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/CONECTORES-PARA-MANGUERA-GRIVEN-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>GRIVEN</li>
                            <li>AQUAFINA</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Terminal de Manguera Plastico</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/Terminal.jfif') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>TRUPER</li>
                            <li>TOOLCRAFT</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Yee de Lavadora</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('plomeria/CONECTOR-YEE-PARA-MANGUERA-AQUA-PLUS-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>AQUAPLUS</li>
                            <li>GRIVEN</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>

  <div class="container" id="lista-productos">





        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Manguera De Desague para Lavadora</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LAVADORA-300x300.jpg') }}" class="card-img-top">
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
                    <h4 class="my-0 font-weight-bold">Manguera Para Llenado de Lavadora</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/MANGUERA-FLEXIBLE-LAADORA-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li>GRIVEN</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Para Ducha</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/llave_ducha.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>AQUAFINA</li>
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
                    <h4 class="my-0 font-weight-bold">LLave Pantry Doble Con Cuello Flexible</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Plomeria/llave_doble_pantry.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Pantry Doble Negra Cuello Fijo</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/llave_pantry.jpg') }}" class="card-img-top">
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
                    <h4 class="my-0 font-weight-bold">Llave Pantry Doble Cuello Fijo</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/llave_pantry_sencilla.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Pantry Sencilla</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Plomeria/LLAVE-DOBLE-METALICA-PARA-PANTRY-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Pantry Doble Acrilica</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-ACRILICA-DOBLE-PARA-PANTRY-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Pantry Doble Manija</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-PARA-PANTRY-MANIJA-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                </div>
            </div>


        </div>

  <div class="container" id="lista-productos">
    </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Abasto para Pantry/Lavamano Doble</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-ABASTO-ANGULAR-DOBLE.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>TOOLCRAFT</li>
                        <li>GRIVEN</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave Abasto para Panntry/Lavamano Sencilla</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/llave_recta.png') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>TOOLCRAFT</li>
                        <li>GRIVEN</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave para Lavamanos Cruzeta</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-CRUZETA-LAAMANOS-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>AQUAFINA</li>
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
                    <h4 class="my-0 font-weight-bold">LLave para Lavamanos</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-DOBLE-LAVAMANOS-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Llave para Lavamano T</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/LLAVE-T.CRUZ-GRIVEN-300x300.jpg') }}" class="card-img-top">
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
                    <h4 class="my-0 font-weight-bold">Manguera Para Lavamano/Pantry</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/MANGUERA-LAVABO-FREGADERO-VINIL-COFLEX-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>COFLEX</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Manguera de Patio</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Plomeria/manguera_regar.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>25 fts (7.5 mts)</li>
                        <li>50 fts (15 mts)</li>
                        <li>75 fts (22.5 mts)</li>
                        <li>100 fts (30 mts)</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Pistola Para Riego de 5 funciones</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/PISTOLA-5-FUNCIONES-PARA-RIEGO-GRIVEN-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>AQUAFINA</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Pistola Metalica Para Riego</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('plomeria/PISTOLA-METALICA-PARA-RIEGO-TRUPER-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>


                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>GRIVEN</li>
                        <li>TOOLCRAFT</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                </div>
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
