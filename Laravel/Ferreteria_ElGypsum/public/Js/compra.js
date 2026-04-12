const compra = new Carrito();
const listaCompra = document.querySelector("#lista-compra tbody");
const carritoCompra = document.getElementById('carrito');
const procesarCompraBtn = document.getElementById('procesar-compra');
const cliente = document.getElementById('cliente');
const correo = document.getElementById('correo');
// Load when DOM is ready (avoid duplicate renders)
cargarEventos();

function cargarEventos() {
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            compra.leerLocalStorageCompra();
            compra.calcularTotal();
        });
    } else {
        compra.leerLocalStorageCompra();
        compra.calcularTotal();
    }

    //Eliminar productos del carrito
    if (carritoCompra) carritoCompra.addEventListener('click', (e) => { compra.eliminarProducto(e) });

    // calcularTotal ya se llama al cargar el DOM

    //cuando se selecciona procesar Compra
    if (procesarCompraBtn) procesarCompraBtn.addEventListener('click', procesarCompra);

    if (carritoCompra) {
        carritoCompra.addEventListener('change', (e) => { compra.obtenerEvento(e) });
        carritoCompra.addEventListener('keyup', (e) => { compra.obtenerEvento(e) });
    }


}

function procesarCompra() {
    // e.preventDefault();
    if (compra.obtenerProductosLocalStorage().length === 0) {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'No hay productos, selecciona alguno',
            showConfirmButton: false,
            timer: 2000
        }).then(function () {
            window.location = "/compra";
        })
    }
    else if (cliente.value === '' || correo.value === '') {
        Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: 'Ingrese todos los campos requeridos',
            showConfirmButton: false,
            timer: 2000
        })
    }
    else {

        //aqui se coloca el user id generado en el emailJS
        (function () {
            emailjs.init("user_CEozz2F39lJJOLF5mJiDA");
        })();

        var myform = $("form#procesar-pago");

        myform.submit( (event) => {
            event.preventDefault();

            // Change to your service ID, or keep using the default service
            var service_id = "default_service";
            var template_id = "template_3SA9LsqQ";

            const cargandoGif = document.querySelector('#cargando');
            cargandoGif.style.display = 'block';

            const enviado = document.createElement('img');
            enviado.src = 'img/mail.gif';
            enviado.style.display = 'block';
            enviado.width = '150';

            emailjs.sendForm(service_id, template_id, myform[0])
                .then(() => {
                    cargandoGif.style.display = 'none';
                    document.querySelector('#loaders').appendChild(enviado);

                    setTimeout(() => {
                        compra.vaciarLocalStorage();
                        enviado.remove();
                        window.location = "/";
                    }, 2000);


                }, (err) => {
                    alert("Error al enviar el email\r\n Response:\n " + JSON.stringify(err));
                    // myform.find("button").text("Send");
                });

            return false;

        });

    }
}

