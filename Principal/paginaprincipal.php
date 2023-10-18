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

    <link rel="stylesheet" type="text/css" href="../Styles/StylePaginaPrincipal.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleBarraDeNavegacion.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleVideoPlayer.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleCarousel.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleTitle.css">

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

    <!-- Incluir: barra de navegacion, titulo personalizado. -->

    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    ?>

    <!-- Contenido de la página -->
    <header class="paginaprincipal">
        <h2>Linux Unified Commands Kit</h2>    
        <p>Tu plataforma de ayuda para Linux y sus distribuciones</p>
    </header>


    
    <!-- seccion informativa: info de la pagina con imagen de la mascota al medio -->
    <section class="informacionPP">
        <div>
            <div>
                <p>
                    Nuestro sitio web es una plataforma versátil diseñada para entusiastas y profesionales de Linux. 
                    Ofrecemos una amplia enciclopedia que te permitirá aprovechar al máximo tu experiencia con Linux.
                </p>
            </div>
            <div>
                <p>
                    ¿Necesitas acceder rápidamente a comandos de Linux específicos? Con nuestra herramienta de búsqueda, 
                    puedes encontrar fácilmente los comandos que necesitas, con descripciones detalladas para garantizar un uso eficaz.
                </p>
            </div>
        </div>
        <div>
            <!-- Aquí puedes poner tu imagen -->
            <img src="\LinuxDataBaseWeb\images\luck.jpg" alt="mascota de la plataforma">
        </div>
        <div>
            <div>
                <p>
                    Si te registras, podras contribuir a nuestra comunidad añadiendo tus propios comandos. 
                    Esta función te permite compartir tus conocimientos y ayudar a otros usuarios a descubrir nuevos comandos útiles.
                </p>
            </div>
            <div>
                <p>
                    Ya sea que seas un administrador de sistemas, un desarrollador o simplemente un amante de Linux, 
                    nuestra plataforma se adaptará a tus necesidades y te ayudará a aprovechar al máximo tu experiencia con Linux.
                </p>
            </div>
        </div>
    </section>



    <!-- incluir: Carrusel de imagenes -->
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\carousel.html';
    ?>


    <!-- Pie de pagina: -->
    <div style="height: 100px;"></div>
    <footer style="text-align: center; position: fixed; bottom: 0; width: 100%; height: 5%;">
        <p>Contacto: luck@duocuc.cl</p>
    </footer>

    <!-- Video player: video introductorio -->
    <div class="video-player">
        <video controls>
            <source src="\LinuxDataBaseWeb\videos\videointroduccion.mp4" type="video/mp4">
            Tu navegador no admite la reproducción de videos.
        </video>
    </div>



    <!-- Script personalizado para la barra de navegacion: indica cual pagina esta activa. -->
    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#inicio-link').addClass('active');
        });
    </script>

</body>
</html>
