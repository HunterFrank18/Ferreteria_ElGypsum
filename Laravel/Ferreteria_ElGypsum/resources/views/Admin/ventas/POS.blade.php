@extends('adminlte::page')

@section('title', 'POS')

@section('content')

<div class="row">

    <!-- PRODUCTOS -->
    <div class="col-md-8">

        <h4>Productos</h4>

        <input type="text" id="buscar" class="form-control mb-3" placeholder="Buscar producto...">

        <div class="row">

           @foreach($variants as $v)
    <div class="col-md-4 mb-3">

        <div class="card p-3 shadow-sm">

            <strong>{{ $v->product->name }}</strong>

            <small class="text-muted">
                {{ $v->brand->name }}
            </small>

            <p class="mb-1">
                Precio:
                <strong>C${{ $v->price }}</strong>
            </p>

            <p>
                Stock:
                <span class="badge {{ $v->stock <= 5 ? 'bg-danger' : 'bg-success' }}">
                    {{ $v->stock }}
                </span>
            </p>

            <button
                class="btn btn-primary btn-sm w-100"
                onclick='agregar({{ $v->id }}, @json($v->product->name), {{ $v->price }}, {{ $v->stock }})'
            >
                Agregar
            </button>

        </div>

    </div>
@endforeach

        </div>

    </div>


    <!-- CARRITO -->
    <div class="col-md-4">

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


<script>

    /*
    ===============================
    BUSCAR PRODUCTOS
    ===============================
    */
    document.getElementById('buscar').addEventListener('keyup', function () {

        let filtro = this.value.toLowerCase();

        let productos = document.querySelectorAll('.card');

        productos.forEach(card => {

            let nombre = card.querySelector('strong').textContent.toLowerCase();

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
                        <input
                            type="number"
                            min="1"
                            value="${p.cantidad}"
                            onchange="cambiarCantidad(${i}, this.value)"
                            style="width:60px"
                        >
                    </td>

                    <td>C$${p.precio}</td>

                    <td>
                        <button
                            type="button"
                            onclick="eliminar(${i})"
                            class="btn btn-danger btn-sm"
                        >
                            X
                        </button>
                    </td>

                </tr>
            `;

        });

        document.getElementById('total').innerText = total;

    }



    /*
    ===============================
    CAMBIAR CANTIDAD
    ===============================
    */
    function cambiarCantidad(i, valor) {

        carrito[i].cantidad = parseInt(valor);

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

                cliente_id: document.querySelector('[name=cliente_id]').value,

                tipo_pago: document.querySelector('[name=tipo_pago]').value

            })

        })

        .then(r => r.json())

        .then(data => {

            if (data.success) {

                alert('Venta realizada 🔥');

                location.reload();

            }

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
