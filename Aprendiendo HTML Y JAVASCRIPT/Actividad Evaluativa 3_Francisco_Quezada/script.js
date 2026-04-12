document.addEventListener('DOMContentLoaded', function () {
  var acapite1 = document.getElementById('acapite1');
  var acapite2 = document.getElementById('acapite2');
  var saludarMenuItem = document.getElementById('saludar');
  var formularioMenuItem = document.getElementById('formulario');
  var mensajeBienvenida = document.getElementById('mensajeBienvenida');
  var cerrarMensaje = document.getElementById('cerrarMensaje');
  var formularioContenedor = document.getElementById('formularioContenedor');
  var cerrarFormulario = document.getElementById('cerrarFormulario');
  var guardarFormulario = document.getElementById('Guardar');
  var gridContainer = document.getElementById('gridContainer');

  var datosArray = []; // Array para almacenar los datos del formulario

  acapite1.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'none';
    formularioContenedor.style.display = 'none';
    saludarMenuItem.style.display = 'block';
  });

  acapite2.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'none';
    saludarMenuItem.style.display = 'none';
    formularioContenedor.style.display = 'block';
  });

  saludarMenuItem.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'block';
  });

  cerrarMensaje.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'none';
  });

  cerrarFormulario.addEventListener('click', function () {
    formularioContenedor.style.display = 'none';
    saludarMenuItem.style.display = 'block';
  });



  // Función para guardar datos del formulario en el array
  guardarFormulario.addEventListener('click', function (event) {
    event.preventDefault();
    var botonGuardar = document.getElementById('Guardar');
    var nombre = document.getElementById('campo1').value;
    var apellido = document.getElementById('campo2').value;
    var correo = document.getElementById('campo3').value;

    // Validación de campos (puedes agregar más validaciones según tus necesidades)

    // Guardar datos en el array
    datosArray.push({ nombre, apellido, correo });

    // Mostrar datos en la grid
    mostrarEnGrid();

    // Limpiar formulario
    limpiarFormulario();
  });

  // Función para mostrar datos en la grid
  function mostrarEnGrid() {
    // Limpiar el contenido actual de la grid
    gridContainer.innerHTML = '';

    // Crear y agregar elementos a la grid
    datosArray.forEach(function (dato, index) {
      var fila = document.createElement('div');
      fila.classList.add('grid-row');
      fila.innerHTML = `<span>${dato.nombre}</span><span>${dato.apellido}</span><span>${dato.correo}</span><button onclick="borrarRegistro(${index})">Borrar</button>`;
      gridContainer.appendChild(fila);
    });
  }

  // Función para limpiar el formulario
  function limpiarFormulario() {
    document.getElementById('campo1').value = '';
    document.getElementById('campo2').value = '';
    document.getElementById('campo3').value = '';
  }

  // Función para borrar un registro del array y actualizar la grid
  window.borrarRegistro = function (index) {
    datosArray.splice(index, 1);
    mostrarEnGrid();
  };
});

document.addEventListener('DOMContentLoaded', function () {
  var botonSaludar = document.getElementById('saludar');
  var mensajeBienvenida = document.getElementById('mensajeBienvenida');
  var cerrarMensaje = document.getElementById('cerrarMensaje');
  var formularioContenedor = document.getElementById('formularioContenedor');

  botonSaludar.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'block';
    formularioContenedor.style.display = 'none'; // Ocultar formulario si estaba visible
  });

  cerrarMensaje.addEventListener('click', function () {
    mensajeBienvenida.style.display = 'none';
  });

  var botonFormulario = document.getElementById('formulario');
  botonFormulario.addEventListener('click', function () {
    formularioContenedor.style.display = 'block';
    mensajeBienvenida.style.display = 'none'; // Ocultar mensaje si estaba visible
  });

  // ... (otros manejadores de eventos)
});

const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
const select = dropdown.querySelector('.select');
const caret = dropdown.querySelector('.caret');
const menu = dropdown.querySelector('.menu');
const options = dropdown.querySelectorAll('.menu li');
const selected = dropdown.querySelector('.selected');

select.addEventListener('click', ()=>{
  select.classList.toggle('selected-clicked');
  caret.classList.toggle('caret-rotate');
  menu.classList.toggle('menu-open');
});

options.forEach(option =>{
  option.addEventListener('click',() => {
    selected.innerText = option.innerText;
    select.classList.remove('select-clicked');
    caret.classList.remove('caret-rotate');
    menu.classList.remove('menu-open');

    options.forEach(option => {
      option.classList.remove('active');
    });
    option.classList.add('active');
  });
});
});
