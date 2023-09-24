<?php
// Incluir la lógica de autenticación de Google
include('../auth_google.php');

// Incluir la lógica de verificación de usuario
include('../auth_login.php');


// Verificar si hay un mensaje de error en la sesión
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
    unset($_SESSION['login_error']); // Limpiar el mensaje de error para no mostrarlo en futuras cargas de la página
}
?>


<!-- Empiezo de la Pagina -->
<!DOCTYPE html>
<html lang="es">
<head> <!--Metadatos y Estilos de la pagina-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pagina principal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles2.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles3.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/AbrirVentanaModal.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/title.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/videointroductorio.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/carousel.js"></script>  
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />




</head>
<body class="paginaprincipal"> 

    <!-- <div class="navbar">
        <a href="/LinuxDataBaseWeb/BuscadorWeb/buscadorweb.php" class="boton-blanco">Abrir buscador de comandos</a>
        <a href="#" class="button" onclick="openLoginModal()">ingresar</a>
    </div> -->

    <?php
    include 'navigationbar.html';
    include 'title.html';
    ?>
    <!-- Contenido de la página -->
    <header class="paginaprincipal">
        <h2>Linux Unified Commands Kit</h2>    
        <p>Encuentra todos los comandos que buscas</p>
    </header>


    <section class="informacionPP">
        <h2 class="informacionPP">Nuestro Sitio</h2>
        <p>
            Nuestro sitio web es una plataforma versátil diseñada para entusiastas y profesionales de Linux. 
            Ofrecemos una amplia enciclopedia que te permitira aprovechar al máximo tu experiencia con Linux.
        </p>
        <p>
            ¿Necesitas acceder rápidamente a comandos de Linux específicos? Con nuestra herramienta de búsqueda, 
            puedes encontrar fácilmente los comandos que necesitas, con descripciones detalladas para garantizar un uso eficaz.
        </p>
        <p>
            Además, si eres un usuario registrado, tienes la capacidad de contribuir a nuestra comunidad añadiendo tus propios comandos. 
            Esta función te permite compartir tus conocimientos y ayudar a otros usuarios a descubrir nuevos comandos útiles.
        </p>
        <p>
            Ya sea que seas un administrador de sistemas, un desarrollador o simplemente un amante de Linux, 
            nuestra plataforma se adaptará a tus necesidades y te ayudará a aprovechar al máximo tu experiencia con Linux.
        </p>
    </section>




    <?php
    include 'carousel.html';
    ?>

    <!-- <section class="features">
        <div class="feature">
            <img src="/LinuxDataBaseWeb/images/mujer.jpg" alt="Característica 1">
            <h3>Busqueda y filtrado rapido</h3>
            <p>Esta increíble característica te permite acceder a una extensa biblioteca de comandos de Linux organizados de manera intuitiva, facilitando su uso y aumentando tu productividad.</p>
        </div>

        <div class="feature">
            <img src="/LinuxDataBaseWeb/images/hombrefeliz.jpg" alt="Característica 2">
            <h3>Interfaz amigable</h3>
            <p>Con esta herramienta, podrás buscar, filtrar y encontrar rápidamente los comandos que necesitas, con descripciones detalladas para asegurar que utilices cada comando de forma efectiva.</p>
        </div>
    </section>

    <section class="testimonial">
        <img src="/LinuxDataBaseWeb/images/hombrepensador.png" alt="Testimonio 1">
        <p>"LUCK ha sido una herramienta invaluable en mi trabajo diario. Ahorro tiempo y esfuerzo al encontrar los comandos que necesito de manera rápida y sencilla. ¡Altamente recomendado!"</p>
        <p>- Soctor Dex</p>
    </section> -->


    <div class="center-button">
        <a href="#" class="cta-button" onclick="openLoginModal()">¡Registrate ahora!</a>
    </div>

    <div style="height: 100px;"></div>
    <footer style="text-align: center; position: fixed; bottom: 0; width: 100%; height: 5%;">
        <p>Contacto: luck@duocuc.cl</p>
    </footer>

    <div class="video-player">
        <video controls>
            <source src="\LinuxDataBaseWeb\videos\videointroduccion.mp4" type="video/mp4">
            Tu navegador no admite la reproducción de videos.
        </video>
    </div>



    <!-- Ventana modal de login -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h3>Login</h3>
            <form action="/LinuxDataBaseWeb/auth_login.php" method="POST" onsubmit="console.log('Form submitted.');">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Ingresar</button>
            </form>

            
            <div class="login-button-container">
                <?php
                if ($login_button == '') {
                    // Mostrar información del usuario autenticado con Google, si lo deseas mantener
                } else {
                    echo '<div class="login-button-container">';
                    echo $login_button;
                    echo '</div>';
                }
                ?>
            </div>

            
            <p class="register-text">¿Aún no tienes cuenta? <a href="registrarcuenta.php">Registrate</a></p>

            <button onclick="closeLoginModal()">Cerrar</button>
        </div>
    </div>





    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#inicio-link').addClass('active');
        });
    </script>

</body>
</html>
