<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Herramientas | Ferreteria</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/herramientas.css') }}">
</head>
<body>
@php
    $whatsapp = 'https://wa.me/505865023595';
@endphp

<header class="store-header">
    <div class="top-line">
        <div class="container">
            <span><i class="fa-solid fa-screwdriver-wrench"></i> Categoria Herramientas</span>
            <span><i class="fa-solid fa-ruler-combined"></i> Selecciona marca, medida o presentacion</span>
        </div>
    </div>

    <nav class="catalog-nav">
        <div class="container">
            <a class="brand" href="{{ url('/') }}">
                <span><i class="fa-solid fa-hammer"></i></span>
                Ferreteria El Gypsum
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}">Inicio</a>
                <a class="active" href="{{ url('/tools') }}">Herramientas</a>
                <a href="{{ url('/compra') }}">Compra</a>
            </div>

            <div class="dropdown" id="carrito">
                <button class="cart-button dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-cart-shopping"></i> Carrito
                </button>

                <div class="dropdown-menu dropdown-menu-right cart-dropdown">
                    <div class="table-responsive">
                        <table class="table table-sm mb-2" id="lista-carrito">
                            <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                    <button id="vaciar-carrito" class="btn btn-outline-danger btn-sm btn-block" type="button">
                        Vaciar carrito
                    </button>
                    <button id="procesar-pedido" class="btn btn-success btn-sm btn-block" type="button">
                        Procesar compra
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<main id="lista-productos">
    <section class="hero-tools">
        <div class="container">
            <div class="hero-content">
                <span class="section-kicker"><i class="fa-solid fa-toolbox"></i> Herramientas</span>
                <h1>Herramientas, discos, brocas y accesorios por medida.</h1>
                <p>Escoge la marca y la medida disponible. El precio, stock y carrito se actualizan automaticamente.</p>
                <a class="btn-primary-store" href="#productos">
                    Ver productos
                </a>
            </div>
        </div>
    </section>

    <section id="productos" class="catalog-section">
        <div class="container">
            <div class="section-heading">
                <div>
                    <span class="section-kicker"><i class="fa-solid fa-layer-group"></i> Catalogo de herramientas</span>
                    <h2>Productos de herramientas</h2>
                    <p>Un card por producto, con variantes por marca, medida o presentacion desde la base de datos.</p>
                </div>

                <a class="btn-outline-store" href="{{ url('/') }}">
                    <i class="fa-solid fa-house"></i> Volver al inicio
                </a>
            </div>

            <div class="product-grid">
                @forelse ($productos as $producto)
                    @php
                        $image = $producto->image
                            ? asset('storage/' . $producto->image)
                            : asset('Fondos/ferreteria10.jpg');

                        $variantes = $producto->variants->map(function ($variant) use ($producto, $image) {
                            $brand = optional($variant->brand)->name ?? 'Sin marca';
                            $presentation = $variant->presentation ?: 'Estandar';

                            return [
                                'id' => $variant->id,
                                'brand' => $brand,
                                'presentation' => $presentation,
                                'label' => $brand . ' - ' . $presentation,
                                'price' => number_format($variant->price, 2, '.', ''),
                                'stock' => (int) $variant->stock,
                                'sku' => $variant->sku ?? 'N/A',
                                'title' => $producto->name . ' - ' . $brand . ' - ' . $presentation,
                                'image' => $image,
                            ];
                        })->values();

                        $primera = $variantes->first();
                    @endphp

                    <article class="product-card" data-product-card>
                        <a class="product-image" href="{{ $whatsapp }}">
                            <img
                                src="{{ $image }}"
                                alt="{{ $producto->name }}"
                                onerror="this.onerror=null; this.src='{{ asset('Fondos/ferreteria10.jpg') }}';"
                            >
                            <span class="product-badge">Herramientas</span>
                        </a>

                        <div class="product-info">
                            <span class="product-category">{{ optional($producto->category)->name ?? 'Herramientas' }}</span>
                            <h3>{{ $producto->name }}</h3>
                            <p>{{ $producto->description ?? 'Producto disponible en diferentes marcas, medidas o presentaciones. Selecciona una opcion para ver precio y stock.' }}</p>

                            <label class="variant-label" for="variant-{{ $producto->id }}">Marca / medida</label>
                            <select
                                id="variant-{{ $producto->id }}"
                                class="variant-select"
                                data-variants='@json($variantes)'
                            >
                                @foreach ($producto->variants as $variant)
                                    <option value="{{ $variant->id }}">
                                        {{ optional($variant->brand)->name ?? 'Sin marca' }}
                                        @if ($variant->presentation)
                                            - {{ $variant->presentation }}
                                        @else
                                            - Estandar
                                        @endif
                                    </option>
                                @endforeach
                            </select>

                            <div class="variant-details">
                                <div>
                                    <span>Precio</span>
                                    <strong class="variant-price">C$ {{ $primera['price'] ?? '0.00' }}</strong>
                                </div>
                                <div>
                                    <span>Stock</span>
                                    <strong class="variant-stock">{{ $primera['stock'] ?? 0 }} disponible</strong>
                                </div>
                                <div>
                                    <span>SKU</span>
                                    <strong class="variant-sku">{{ $primera['sku'] ?? 'N/A' }}</strong>
                                </div>
                            </div>
                        </div>

                        <div class="product-footer">
                            <button
                                type="button"
                                class="add-cart-button agregar-carrito"
                                data-id="{{ $primera['id'] ?? '' }}"
                                data-titulo="{{ $primera['title'] ?? $producto->name }}"
                                data-precio="{{ $primera['price'] ?? '0.00' }}"
                                data-imagen="{{ $image }}"
                            >
                                Agregar al carrito
                            </button>

                            <button
                                type="button"
                                class="reserve-button"
                                data-reserve-button
                            >
                                Apartar
                            </button>

                            <a class="whatsapp-button" href="{{ $whatsapp }}" aria-label="Cotizar {{ $producto->name }}">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <i class="fa-solid fa-toolbox"></i>
                        <h3>Aun no hay herramientas</h3>
                        <p>Cuando agregues productos activos con stock en la categoria Herramientas, apareceran automaticamente aqui.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="apartadoModal" tabindex="-1" role="dialog" aria-labelledby="apartadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="apartadoModalLabel">Solicitar apartado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="apartadoForm">
                <div class="modal-body">
                    <div class="alert alert-light border">
                        <strong id="apartadoProducto">Producto seleccionado</strong>
                        <br>
                        <span id="apartadoPrecio" class="text-muted">C$ 0.00</span>
                    </div>

                    <input type="hidden" id="apartadoVariantId">
                    <input type="hidden" id="apartadoTitulo">
                    <input type="hidden" id="apartadoPrecioValue">

                    <div class="form-group">
                        <label for="apartadoNombre">Nombre</label>
                        <input type="text" class="form-control" id="apartadoNombre" placeholder="Tu nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="apartadoTelefono">Telefono / WhatsApp</label>
                        <input type="tel" class="form-control" id="apartadoTelefono" placeholder="Ej: 505865023595" required>
                    </div>

                    <div class="form-group">
                        <label for="apartadoCorreo">Correo opcional</label>
                        <input type="email" class="form-control" id="apartadoCorreo" placeholder="correo@ejemplo.com">
                    </div>

                    <div class="form-group">
                        <label for="apartadoCantidad">Cantidad</label>
                        <input type="number" class="form-control" id="apartadoCantidad" min="1" value="1" required>
                    </div>

                    <div class="form-group mb-0">
                        <label for="apartadoNota">Nota opcional</label>
                        <textarea class="form-control" id="apartadoNota" rows="3" placeholder="Ej: Lo retiro el sabado por la tarde"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning font-weight-bold" id="apartadoSubmit">Enviar apartado</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const whatsappBase = @json($whatsapp);

    function updateVariantCard(card) {
        const select = card.querySelector('.variant-select');
        const price = card.querySelector('.variant-price');
        const stock = card.querySelector('.variant-stock');
        const sku = card.querySelector('.variant-sku');
        const addButton = card.querySelector('.agregar-carrito');
        const reserveButton = card.querySelector('[data-reserve-button]');
        const whatsapp = card.querySelector('.whatsapp-button');

        const variants = JSON.parse(select.dataset.variants || '[]');
        const selected = variants.find(variant => String(variant.id) === String(select.value));

        if (!selected) return;

        price.textContent = 'C$ ' + selected.price;
        stock.textContent = selected.stock + ' disponible';
        sku.textContent = selected.sku || 'N/A';

        addButton.dataset.id = selected.id;
        addButton.dataset.titulo = selected.title;
        addButton.dataset.precio = selected.price;
        addButton.dataset.imagen = selected.image;

        reserveButton.dataset.id = selected.id;
        reserveButton.dataset.titulo = selected.title;
        reserveButton.dataset.precio = selected.price;

        const message = `Hola, quiero cotizar: ${selected.title}. Precio mostrado: C$ ${selected.price}. SKU: ${selected.sku || 'N/A'}`;
        whatsapp.href = whatsappBase + '?text=' + encodeURIComponent(message);
    }

    document.querySelectorAll('[data-product-card]').forEach(card => {
        updateVariantCard(card);

        const select = card.querySelector('.variant-select');
        select.addEventListener('change', () => updateVariantCard(card));
    });

    document.querySelectorAll('[data-reserve-button]').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('apartadoVariantId').value = button.dataset.id;
            document.getElementById('apartadoTitulo').value = button.dataset.titulo;
            document.getElementById('apartadoPrecioValue').value = button.dataset.precio;
            document.getElementById('apartadoProducto').textContent = button.dataset.titulo;
            document.getElementById('apartadoPrecio').textContent = 'Precio mostrado: C$ ' + button.dataset.precio;
            document.getElementById('apartadoCantidad').value = 1;

            $('#apartadoModal').modal('show');
        });
    });

    document.getElementById('apartadoForm').addEventListener('submit', async (event) => {
        event.preventDefault();

        const submit = document.getElementById('apartadoSubmit');
        const nombre = document.getElementById('apartadoNombre').value.trim();
        const telefono = document.getElementById('apartadoTelefono').value.trim();
        const correo = document.getElementById('apartadoCorreo').value.trim();
        const cantidad = Number(document.getElementById('apartadoCantidad').value || 1);
        const nota = document.getElementById('apartadoNota').value.trim();

        if (!nombre || !telefono || cantidad < 1) {
            Swal.fire({
                icon: 'warning',
                title: 'Datos incompletos',
                text: 'Ingresa tu nombre, telefono y una cantidad valida.',
                confirmButtonColor: '#f97316'
            });
            return;
        }

        submit.disabled = true;
        submit.textContent = 'Enviando...';

        try {
            const response = await fetch("{{ route('solicitudes.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    tipo: 'apartado',
                    cliente_nombre: nombre,
                    cliente_telefono: telefono,
                    cliente_correo: correo || null,
                    nota: nota || null,
                    items: [{
                        id: document.getElementById('apartadoVariantId').value,
                        titulo: document.getElementById('apartadoTitulo').value,
                        precio: document.getElementById('apartadoPrecioValue').value,
                        cantidad: cantidad
                    }]
                })
            });

            const data = await response.json();

            if (!response.ok || !data.ok) {
                throw new Error(data.message || 'No se pudo enviar el apartado.');
            }

            $('#apartadoModal').modal('hide');
            document.getElementById('apartadoForm').reset();

            Swal.fire({
                icon: 'success',
                title: 'Apartado enviado',
                html: `Codigo: <strong>${data.codigo}</strong><br>El vendedor ya podra verlo en el panel.`,
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
                title: 'No se pudo enviar',
                text: error.message || 'Intenta nuevamente.',
                confirmButtonColor: '#f97316'
            });
        } finally {
            submit.disabled = false;
            submit.textContent = 'Enviar apartado';
        }
    });
</script>

<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/carrito.js') }}"></script>
<script src="{{ asset('js/pedido.js') }}"></script>
</body>
</html>
