function ocultar() {

    let contenedor = document.querySelector('.time');

    contenedor.classList.add('container');
    contenedor.classList.add('d-none');

}

setTimeout(ocultar, 1000);
// clearTimeout(timer);