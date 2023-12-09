function mostrarMensaje(event) {
    const mensajeCursor = document.getElementById('mensajeCursor');
    mensajeCursor.style.display = 'block';
    actualizarPosicionMensaje(event);
}

function ocultarMensaje() {
    const mensajeCursor = document.getElementById('mensajeCursor');
    mensajeCursor.style.display = 'none';
}

function actualizarPosicionMensaje(event) {
    const mensajeCursor = document.getElementById('mensajeCursor');
    mensajeCursor.style.left = (event.pageX + 10) + 'px';
    mensajeCursor.style.top = (event.pageY + 10) + 'px';
}

document.addEventListener('mousemove', function (event) {
    const mensajeCursor = document.getElementById('mensajeCursor');
    if (mensajeCursor.style.display === 'block') {
        actualizarPosicionMensaje(event);
    }
});