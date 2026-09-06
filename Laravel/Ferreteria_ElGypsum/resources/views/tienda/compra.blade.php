<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proforma | Ferreteria El Gypsum</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/compra.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>
    <header class="quote-header">
        <div class="top-line">
            <div class="container">
                <span><i class="fas fa-file-invoice"></i> Proforma de cotizacion</span>
                <span><i class="fas fa-phone"></i> WhatsApp: 505865023595</span>
            </div>
        </div>

        <nav class="quote-nav">
            <div class="container">
                <a class="brand" href="{{ url('/index') }}">
                    <span>FG</span>
                    Ferreteria El Gypsum
                </a>
                <a class="back-link" href="{{ url('/index') }}">
                    <i class="fas fa-store"></i> Seguir comprando
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="quote-hero">
            <div class="container">
                <span class="section-kicker"><i class="fas fa-clipboard-list"></i> Cotizacion</span>
                <h1>Revisa tu lista y genera una proforma clara.</h1>
                <p>Completa los datos del cliente, ajusta cantidades y exporta el PDF para confirmar precios y disponibilidad.</p>
            </div>
        </section>

        <section class="quote-section">
            <div class="container">
                <div class="quote-panel">
                    <form id="procesar-pago" action="#" method="post">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="cliente">Cliente</label>
                                <input type="text" class="form-control" id="cliente" placeholder="Nombre del cliente" name="destinatario" required>
                            </div>

                            <div class="form-group">
                                <label for="telefono">Telefono / WhatsApp</label>
                                <input type="tel" class="form-control" id="telefono" placeholder="Ej: 505865023595" name="telefono" required>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo" placeholder="correo@ejemplo.com" name="cc_to" required>
                            </div>
                        </div>

                        <div class="table-card" id="carrito">
                            <div class="table-card-header">
                                <div>
                                    <h2>Detalle de productos</h2>
                                    <p>Actualiza cantidades antes de exportar.</p>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table quote-table" id="lista-compra">
                                    <thead>
                                        <tr>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Sub Total</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">SUBTOTAL</th>
                                        <th scope="col"><p id="subtotal"></p></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">IMPUESTOS</th>
                                        <th scope="col"><p id="igv"></p></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" scope="col" class="text-right">TOTAL</th>
                                        <th scope="col">
                                            <input id="total" name="monto" class="font-weight-bold border-0 total-input" readonly>
                                        </th>
                                        <th></th>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-center" id="loaders">
                            <img id="cargando" src="{{ asset('img/cargando.gif') }}" width="220" alt="Cargando">
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4 mb-2">
                                <a href="{{ url('/index') }}" class="btn btn-outline-dark btn-block">
                                    <i class="fas fa-arrow-left"></i> Seguir comprando
                                </a>
                            </div>
                            <div class="col-md-4 mb-2">
                                <button type="button" onclick="genPDF()" class="btn btn-success btn-block" id="exportar-pdf">
                                    <i class="fas fa-file-pdf"></i> Exportar PDF
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        function formatMoney(value) {
            const number = Number(value || 0);
            return 'C$ ' + number.toFixed(2);
        }

        async function genPDF() {
            const clienteNombre = document.getElementById('cliente').value.trim();
            const clienteTelefono = document.getElementById('telefono').value.trim();
            const clienteCorreo = document.getElementById('correo').value.trim();
            const productos = JSON.parse(localStorage.getItem('productos') || '[]');
            const correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(clienteCorreo);
            if (!clienteNombre || !clienteTelefono || !clienteCorreo) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Datos incompletos',
                    text: 'Completa nombre, telefono y correo antes de generar la proforma.',
                    confirmButtonColor: '#f6b400'
                });
                return;
            }

            if (!correoValido) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Correo invalido',
                    text: 'Ingresa un correo valido para continuar.',
                    confirmButtonColor: '#f6b400'
                });
                return;
            }

            if (productos.length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Carrito vacio',
                    text: 'Agrega productos antes de generar la proforma.',
                    showConfirmButton: false,
                    timer: 1800
                });
                return;
            }

            const exportButton = document.getElementById('exportar-pdf');
            exportButton.disabled = true;
            exportButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generando...';

            try {
                const response = await fetch("{{ route('solicitudes.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        tipo: 'cotizacion',
                        cliente_nombre: clienteNombre,
                        cliente_telefono: clienteTelefono,
                        cliente_correo: clienteCorreo,
                        items: productos.map((producto) => ({
                            id: producto.id,
                            titulo: producto.titulo,
                            precio: producto.precio,
                            cantidad: Number(producto.cantidad || 1)
                        }))
                    })
                });

                const data = await response.json();

                if (!response.ok || !data.ok) {
                    throw new Error(data.message || 'No se pudo generar la proforma.');
                }

                const download = document.createElement('a');
                download.href = data.download_url;
                download.target = '_blank';
                download.rel = 'noopener';
                download.click();

                Swal.fire({
                    icon: 'success',
                    title: 'Proforma creada',
                    html: `Codigo: <strong>${data.codigo}</strong><br>La solicitud ya quedo guardada en el panel admin.`,
                    showCancelButton: true,
                    confirmButtonText: 'Avisar por WhatsApp',
                    cancelButtonText: 'Cerrar',
                    confirmButtonColor: '#25d366'
                }).then((result) => {
                    if (result.isConfirmed && data.whatsapp_url) {
                        window.open(data.whatsapp_url, '_blank', 'noopener');
                    }
                });
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo generar',
                    text: error.message || 'Revisa tu conexion e intenta nuevamente.',
                    confirmButtonColor: '#f6b400'
                });
            } finally {
                exportButton.disabled = false;
                exportButton.innerHTML = '<i class="fas fa-file-pdf"></i> Exportar PDF';
            }
        }
    </script>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/pedido.js') }}"></script>
    <script src="{{ asset('js/compra.js') }}"></script>
</body>
</html>
