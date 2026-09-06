<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinturas | Ferreteria</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pinturas.css') }}">
</head>
<body>
@php
    $whatsapp = 'https://wa.me/505865023595';
@endphp

<header class="store-header">
    <div class="top-line">
        <div class="container">
            <span><i class="fa-solid fa-paint-roller"></i> Categoria Pinturas</span>
            <span><i class="fa-solid fa-droplet"></i> Escoge marca, color o presentacion</span>
        </div>
    </div>

    <nav class="catalog-nav">
        <div class="container">
            <a class="brand" href="{{ url('/') }}">
                <span><i class="fa-solid fa-paint-roller"></i></span>
                Ferreteria El Gypsum
            </a>

            <div class="nav-links">
                <a href="{{ url('/') }}">Inicio</a>
                <a class="active" href="{{ url('/pinturas') }}">Pinturas</a>
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
    <section class="hero-paints">
        <div class="container">
            <div class="hero-content">
                <span class="section-kicker"><i class="fa-solid fa-palette"></i> Pinturas</span>
                <h1>Pinturas, selladores y accesorios por presentacion.</h1>
                <p>Selecciona marca, color o presentacion. El precio, stock y carrito se actualizan automaticamente.</p>
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
                    <span class="section-kicker"><i class="fa-solid fa-layer-group"></i> Catalogo de pinturas</span>
                    <h2>Productos de pinturas</h2>
                    <p>Un card por producto, con variantes por marca, color, medida o presentacion desde la base de datos.</p>
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
                            : asset('Fondos/ferreteria9.jpg');

                        $variantes = $producto->variants->map(function ($variant) use ($producto, $image) {
                            $brand = optional($variant->brand)->name ?? 'Sin marca';
                            $presentation = $variant->presentation ?: 'Estandar';
                            $color = $variant->color ?: null;

                            return [
                                'id' => $variant->id,
                                'brand' => $brand,
                                'presentation' => $presentation,
                                'color' => $color,
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
                                onerror="this.onerror=null; this.src='{{ asset('Fondos/ferreteria9.jpg') }}';"
                            >
                            <span class="product-badge">Pinturas</span>
                        </a>

                        <div class="product-info">
                            <span class="product-category">{{ optional($producto->category)->name ?? 'Pinturas' }}</span>
                            <h3>{{ $producto->name }}</h3>
                            <p>{{ $producto->description ?? 'Producto disponible en diferentes marcas, colores o presentaciones. Selecciona una opcion para ver precio y stock.' }}</p>

                            <label class="variant-label" for="variant-{{ $producto->id }}">Marca / presentacion</label>
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

                                        @if ($variant->color)
                                            - {{ $variant->color }}
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

                            <a class="whatsapp-button" href="{{ $whatsapp }}" aria-label="Cotizar {{ $producto->name }}">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <i class="fa-solid fa-paint-roller"></i>
                        <h3>Aun no hay productos de pinturas</h3>
                        <p>Cuando agregues productos activos con stock en la categoria Pinturas, apareceran automaticamente aqui.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</main>

<script>
    const whatsappBase = @json($whatsapp);

    function updateVariantCard(card) {
        const select = card.querySelector('.variant-select');
        const price = card.querySelector('.variant-price');
        const stock = card.querySelector('.variant-stock');
        const sku = card.querySelector('.variant-sku');
        const addButton = card.querySelector('.agregar-carrito');
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

        const message = `Hola, quiero cotizar: ${selected.title}. Precio mostrado: C$ ${selected.price}. SKU: ${selected.sku || 'N/A'}`;
        whatsapp.href = whatsappBase + '?text=' + encodeURIComponent(message);
    }

    document.querySelectorAll('[data-product-card]').forEach(card => {
        updateVariantCard(card);

        const select = card.querySelector('.variant-select');
        select.addEventListener('change', () => updateVariantCard(card));
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
