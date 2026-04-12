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
