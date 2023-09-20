// Selecciona el elemento del reproductor de video
const videoPlayer = document.querySelector('.video-player');

// Función para actualizar la posición del reproductor de video
function updateVideoPlayerPosition() {
    const windowHeight = window.innerHeight;
    const playerHeight = videoPlayer.clientHeight;
    const scrollTop = window.scrollY;

    // Calcula la posición vertical del reproductor
    const positionY = windowHeight - playerHeight + scrollTop;

    // Aplica la posición al reproductor de video
    videoPlayer.style.bottom = positionY + 'px';
}

// Registra un evento para actualizar la posición cuando se desplaza la página
window.addEventListener('scroll', updateVideoPlayerPosition);
window.addEventListener('resize', updateVideoPlayerPosition);

// Llama a la función para configurar la posición inicial
updateVideoPlayerPosition();
