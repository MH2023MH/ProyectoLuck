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
    <title>Pagina principal Luck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../Styles/StylePaginaPrincipal.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleBarraDeNavegacion.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleVideoPlayer.css">
    <!-- <link rel="stylesheet" type="text/css" href="../Styles/StyleCarousel.css"> -->
    <link rel="stylesheet" type="text/css" href="../Styles/StyleCarousel2.css">

    <!-- <link rel="stylesheet" type="text/css" href="../Styles/StyleTitle.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="../Styles/Stylestitle2.css"> -->
    <link rel="stylesheet" type="text/css" href="../Styles/StyleFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="/LinuxDataBaseWeb/Scripts/AbrirVentanaModal.js"></script> -->
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <!-- <script src="/LinuxDataBaseWeb/Scripts/title.js"></script> -->
    <script src="/LinuxDataBaseWeb/Scripts/videointroductorio.js"></script>
    <!-- <script src="/LinuxDataBaseWeb/Scripts/carousel.js"></script>   -->
    <script src="/LinuxDataBaseWeb/Scripts/carousel2.js"></script>  

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body class="paginaprincipal"> 

    <!-- Incluir: barra de navegacion, titulo personalizado. -->
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    
    // include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title2.html';
    ?>


    <!-- Logo Duoc con enlace a su pagina principal-->
    <a href="https://www.duoc.cl" class="logo" target="_blank">
        <img class="logo" src="\LinuxDataBaseWeb\images\LogoDuocLuck.png" alt="logo de la plataforma">
    </a>

    <!-- contenedor de la imagen de fondo -->
    <div class="background-container"></div>

    
    <!-- Texto en el centro -->
    <div class="center-text">
        <p class="main-title">DuocUC Luck</p>
        <p class="sub-link"><a href="https://www.duoc.cl/">Inicio /</a> <a href="https://campusvirtual.duoc.cl/">Alumnos</a></p>
    </div>


    
    <?php
    
    // include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    // include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title2.html';
    ?>

    <!-- Nueva sección para separar visualmente la imagen de fondo del carrusel -->
    <div class="background-separator"></div>

    <!-- Contenido de la página -->
    <header class="paginaprincipal">
        <h1>Linux Unified Commands Kit</h1>
        <p>Tu plataforma de ayuda para Linux y sus distribuciones</p>
        <p class="ofrecemos" style="font-size:50px;">¿Que ofrecemos?</p>
    </header>



    <!-- incluir: Carrusel de imagenes -->
    <div class="carousel-container">
        <?php
            // include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\carousel.html';
            include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\carousel2.html';
        ?>
    </div>
    

    <!-- footer del Duoc -->
    <?php include '..\ArquitecturaGeneral\footer.html'; ?>


    <!-- Video player: video introductorio -->
    <!-- <div class="video-player">
        <video controls>
            <source src="\LinuxDataBaseWeb\videos\videointroduccion.mp4" type="video/mp4">
            Tu navegador no admite la reproducción de videos.
        </video>
    </div> -->



    <!-- Script personalizado para la barra de navegacion: indica cual pagina esta activa. -->
    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#inicio-link').addClass('active');
        });
    </script>

    <script>
    $(document).ready(function(){
        // Simula clic en el botón de despliegue de Contáctanos
        $('.navbar-toggler.heading').trigger('click');
    });
    </script>


</body>
</html>