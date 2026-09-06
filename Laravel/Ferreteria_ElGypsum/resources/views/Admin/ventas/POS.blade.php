@extends('adminlte::page')

@section('title', 'POS')

@section('content')

<div class="row">

    <!-- PRODUCTOS -->
    <div class="col-md-8 order-2 order-md-1">

        <h4>Productos</h4>

        <input type="text" id="buscar" class="form-control mb-3" placeholder="Buscar producto...">

<div class="row">

@foreach($products as $product)
<div class="col-md-4 mb-4">

    <div class="card shadow-sm h-100">

        {{-- Imagen --}}
        <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" height="200" style="object-fit:cover;" loading="lazy" decoding="async" alt="{{ $product->name }}">

        <div class="card-body">

            {{-- Nombre --}}
            <h5 class="card-title">{{ $product->name }}</h5>

            {{-- Selector de marca --}}
            <select class="form-control mb-2 variant-select" data-product="{{ $product->id }}">
                @foreach($product->variants as $variant)
                    <option
                        value="{{ $variant->id }}"
                        data-price="{{ $variant->price }}"
                        data-stock="{{ $variant->stock }}">
                        {{ $variant->brand->name }}
                    </option>
                @endforeach
            </select>

            {{-- Precio --}}
            <p class="mb-1">
                Precio:
                <strong class="price" id="price-{{ $product->id }}">
                    C${{ $product->variants->first()->price }}
                </strong>
            </p>

            {{-- Stock --}}
            <p>
                Stock:
                <span class="badge bg-success stock" id="stock-{{ $product->id }}">
                    {{ $product->variants->first()->stock }}
                </span>
            </p>

            {{-- Botón --}}
            <button class="btn btn-primary w-100 add-to-cart"
                data-variant="{{ $product->variants->first()->id }}">
                Agregar
            </button>

        </div>
    </div>

</div>
@endforeach

</div>

        </div>

    <!-- CARRITO -->
    <div class="col-md-4 order-1 order-md-2 mb-4">
        <div style="position:sticky; top:1rem;">
            <h4>Carrito</h4>

        <form id="formVenta">

            <input
                type="text"
                id="buscarCliente"
                class="form-control mb-2"
                placeholder="Buscar cliente..."
            >

            <select
                name="cliente_id"
                id="clienteSelect"
                class="form-control mb-2"
            >
                <option value="">Consumidor Final</option>

                @foreach($clientes as $c)
                    <option value="{{ $c->id }}">
                        {{ $c->nombre }}
                    </option>
                @endforeach
            </select>

            <button
                type="button"
                class="btn btn-info btn-sm mb-2"
                onclick="nuevoCliente()"
            >
                + Nuevo Cliente
            </button>


            <select
                name="tipo_pago"
                class="form-control mb-3"
            >
                <option value="contado">Contado</option>
                <option value="credito">Crédito</option>
            </select>


            <table class="table" id="carrito">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cant</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody></tbody>
            </table>


            <h4>
                Total: C$
                <span id="total">0</span>
            </h4>

            <button
                type="submit"
                class="btn btn-success btn-sm w-100"
            >
                Guardar Venta
            </button>

        </form>

        </div>

    </div>

</div>


<script>


document.querySelectorAll('.variant-select').forEach(select => {

    select.addEventListener('change', function () {

        let selected = this.options[this.selectedIndex];

        let price = selected.getAttribute('data-price');
        let stock = selected.getAttribute('data-stock');
        let variantId = selected.value;

        let productId = this.getAttribute('data-product');

        // actualizar precio
        document.getElementById('price-' + productId).innerText = "C$" + price;

        // actualizar stock
        let stockBadge = document.getElementById('stock-' + productId);
        stockBadge.innerText = stock;

        // cambiar color stock
        stockBadge.className = stock > 10
            ? 'badge bg-success stock'
            : 'badge bg-danger stock';

        // actualizar botón
        let btn = this.closest('.card-body').querySelector('.add-to-cart');
        btn.setAttribute('data-variant', variantId);
    });

});

// Botones Agregar al carrito
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        let cardBody = this.closest('.card-body');
        let variantSelect = cardBody.querySelector('.variant-select');
        let selectedOption = variantSelect.options[variantSelect.selectedIndex];
        let variantId = selectedOption.value;
        let brand = selectedOption.textContent.trim();
        let nombre = `${cardBody.querySelector('.card-title').textContent.trim()} - ${brand}`;
        let precio = parseFloat(selectedOption.getAttribute('data-price'));
        let stock = parseInt(selectedOption.getAttribute('data-stock'), 10);

        agregar(variantId, nombre, precio, stock);
    });
});


    /*
    ===============================
    BUSCAR PRODUCTOS
    ===============================
    */
    document.getElementById('buscar').addEventListener('keyup', function () {

        let filtro = this.value.toLowerCase();

        let productos = document.querySelectorAll('.card');

        productos.forEach(card => {

            let nombreEl = card.querySelector('.card-title');
            let nombre = nombreEl ? nombreEl.textContent.toLowerCase() : '';

            card.parentElement.style.display = nombre.includes(filtro) ? '' : 'none';

        });

    });



    /*
    ===============================
    BUSCAR CLIENTE
    ===============================
    */
    document.getElementById('buscarCliente').addEventListener('keyup', function () {

        let filtro = this.value.toLowerCase();

        let opciones = document.querySelectorAll('#clienteSelect option');

        opciones.forEach(op => {

            op.style.display =
                op.text.toLowerCase().includes(filtro)
                    ? ''
                    : 'none';

        });

    });



    /*
    ===============================
    VARIABLES
    ===============================
    */
    let carrito = [];



    /*
    ===============================
    AGREGAR PRODUCTO
    ===============================
    */
    function agregar(id, nombre, precio, stock) {

        let item = carrito.find(p => p.id == id);

        if (item) {

            if (item.cantidad + 1 > stock) {
                alert('No hay suficiente stock');
                return;
            }

            item.cantidad++;

        } else {

            if (stock <= 0) {
                alert('Sin stock');
                return;
            }

            carrito.push({
                id,
                nombre,
                precio,
                cantidad: 1,
                stock
            });

        }

        render();
    }



    /*
    ===============================
    RENDER CARRITO
    ===============================
    */
    function render() {

    let tbody = document.querySelector('#carrito tbody');
    tbody.innerHTML = '';

    let total = 0;

    carrito.forEach((p, i) => {

        total += p.precio * p.cantidad;

        tbody.innerHTML += `
        <tr>
            <td>${p.nombre}</td>

            <td>
                <input type="number"
                value="${p.cantidad}"
                min="1"
                onchange="cambiarCantidad(${i}, this.value)"
                class="form-control form-control-sm">
            </td>

            <td>
                <input type="number"
                value="${p.precio}"
                step="0.01"
                onchange="cambiarPrecio(${i}, this.value)"
                class="form-control form-control-sm">
            </td>

            <td>
                <button onclick="eliminar(${i})" class="btn btn-danger btn-sm">X</button>
            </td>
        </tr>`;
    });

    document.getElementById('total').innerText = total;
}


function cambiarPrecio(index, nuevoPrecio){
    carrito[index].precio = parseFloat(nuevoPrecio);
    render();
}


    /*
    ===============================
    CAMBIAR CANTIDAD
    ===============================
    */
   function cambiarCantidad(index, nuevaCantidad){
    let cantidad = parseInt(nuevaCantidad);

    if(cantidad <= 0 || isNaN(cantidad)){
        cantidad = 1;
    }

    carrito[index].cantidad = cantidad;
    render();
}


    /*
    ===============================
    ELIMINAR
    ===============================
    */
    function eliminar(i) {

        carrito.splice(i, 1);

        render();

    }



    /*
    ===============================
    GUARDAR VENTA
    ===============================
    */
    document.getElementById('formVenta').addEventListener('submit', function (e) {
        e.preventDefault();

        let tipoPago = document.querySelector('[name=tipo_pago]').value;
        let clienteId = document.querySelector('[name=cliente_id]').value;

        // Validación frontend: Si es crédito, debe seleccionar cliente
        if(tipoPago === 'credito' && !clienteId){
            alert('Debes seleccionar un cliente para ventas a crédito.');
            return;
        }

        fetch("{{ route('admin.ventas.storePOS') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                productos: carrito,
                total: document.getElementById('total').innerText,
                subtotal: document.getElementById('total').innerText,
                cliente_id: clienteId,
                tipo_pago: tipoPago
            })
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                alert('Venta realizada 🔥');
                location.reload();
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(() => {
            alert('Ocurrió un error al procesar la venta.');
        });
    });



    /*
    ===============================
    NUEVO CLIENTE
    ===============================
    */
    function nuevoCliente() {

        let nombre = prompt("Nombre del cliente");

        if (!nombre) return;

        fetch("/admin/clientes", {

            method: "POST",

            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },

            body: JSON.stringify({
                nombre: nombre,
                estado: 'activo'
            })

        })

        .then(r => r.json())

        .then(data => {

            alert('Cliente creado 🔥');

            location.reload();

        });

    }

</script>

@endsection
