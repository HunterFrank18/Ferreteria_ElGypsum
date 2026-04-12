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
    <link rel="stylesheet" href="{{ asset('css/seguridad.css') }}">

    <title>Bienvenido a la categoria Electricidad</title>
</head>

<body>


<style>
        body {
            background: url("{{ asset('Fondos/ferreteria4.jpg') }}");
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
                    <a class="navbar-brand" href="{{ url('/index') }}">Ferreteria El Gypsum <i class="fa-solid fa-lock"></i></a>
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
                        <h4 class="my-0 font-weight-bold">Candado Lion</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/candado_lion.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>30 mm</li>
                            <li>50 mm</li>
                            <li>60 mm</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Candado Para Intemperie</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/candado_intemperie.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>30 mm</li>
                            <li>50 mm</li>

                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Candado Anticizalla</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/candado_antisisalla.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>30 mm</li>
                            <li>50 mm</li>
                            <li>60 mm</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Candado Anticizalla Acorazado</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/candado_acorazado.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>TOTAL</li>
                            <li>YALE</li>
                            <li>HERMEX</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Bisagra para Mueble</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/BISAGRA_MUEBLE.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>HERMEX</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Bisagra Cuadrada</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/BISAGRA-CUADRADA-ACERO-INOX-3-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>2x2</li>
                            <li>3x3</li>
                            <li>4x4


                            </li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Candado Para Moto</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CANDADO-PARA-MOTO-USO-RUDO-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Mascara Para Soldar</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CARETA-DE-SOLDADOR-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>TOTAL</li>
                            <li></li>
                            <li>UYUSTOOL</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Casco de Seguridad Profer</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CASCO-DE-SEGURIDAD-BLANCO-PROFER-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>BLANCO</li>
                            <li>AMARILLO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>





            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura de Parche Izquierda</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/cerradura_izq.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>HERMEX</li>
                            <li>RABBIT</li>
                            <li>PHILLIPS</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura de Pelota</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CERRADURA-DE-PELOTA-INOXIDABLE-GEO-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>BOXER</li>
                            <li>GEO</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura Doble Accion Derecha</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CERRADURA-DOBLE-ACCION-DERECHA-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>HERMEX</li>
                            <li>BOXER</li>
                            <li>RABBIT</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura Doble Accion Izquierda</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CERRADURA-DOBLE-ACCION-IZQUIERDA-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>HERMEX</li>
                            <li>RABBIT</li>
                            <li>BOXER</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura Para Porton Derecha</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CERRADURA-PARA-PORTON-DERECHA-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li>HERMEX</li>
                            <li>RABBIT</li>
                            <li>BOXER</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cerradura Para Porton Izquierda</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CERRADURA-PARA-PORTON-IZQUIERDA-HERMEX-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                              <li>HERMEX</li>
                              <li>RABBIT</li>
                              <li>BOXER</li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                    </div>
                </div>

            </div>

            <div class="card-deck mb-3 text-center">

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Chaleco Reflectivo</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CHALECO-REFLECTIVO-NARANJA-PRETUL-1-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li>PRETUL</li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cinta de Precaucion</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CINTA-PRECAUCION-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                    </div>
                </div>

                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-bold">Cono de Seguridad</h4>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('Seguridad/CONO20-300x300.jpg') }}" class="card-img-top">
                        <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                        <ul class="list-unstyled mt-3 mb-4">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="9">Comprar</a>
                    </div>
                </div>


            </div>









        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Pata Para Puerta</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/FIJA-PUERTA-BRONCE-SECURITY-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li>SECURITY</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="1">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Soporte Para Cortina</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/FLANGE-PARA-CLOSET-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="2">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Guantes Anti-Derrape</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/GUANTES-ANTIDERRAPANTES-VERDES-TRUPER-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>TRUPER</li>
                        <li>SECURITY</li>

                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="3">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Guantes de Cuero Para Soldar</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/GUANTES-CUERO-LONETA-TRUPER-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li>SECURITY</li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="4">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Mascara Doble</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/Mascara_doble.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="5">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Pasador de Barra Brickell</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/PASADOR-DE-BARRA-4-BRICKELL-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>1"</li>
                        <li>2"</li>
                        <li>3"</li>
                        <li>4"</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="6">Comprar</a>
                </div>
            </div>

        </div>

        <div class="card-deck mb-3 text-center">

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Porta-Candados Brickell</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/PORTA-CANDADO-DORADO--300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>1"</li>
                        <li>2"</li>
                        <li>3"</li>
                        <li>4"</li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="7">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Respirador de un Filtro</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/RESPIRADOR-DE-UN-FILTRO-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <a href="" class="btn btn-block btn-primary agregar-carrito" data-id="8">Comprar</a>
                </div>
            </div>

            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-bold">Vidrio Para Mascara de Soldar</h4>
                </div>
                <div class="card-body">
                    <img src="{{ asset('Seguridad/VIDRIO-300x300.jpg') }}" class="card-img-top">
                    <h1 class="card-title pricing-card-title precio"><span class="">Disponible</span></h1>

                    <ul class="list-unstyled mt-3 mb-4">
                        <li></li>
                        <li>#10</li>
                        <li>#12</li>
                        <li>#14</li>
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
