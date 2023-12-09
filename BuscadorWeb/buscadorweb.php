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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buscador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../Styles/StyleBuscadorWeb.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleBarraDeNavegacion.css">
    <!-- <link rel="stylesheet" type="text/css" href="../Styles/StyleTitle.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/AbrirVentanaModal.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/buscadorweb.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/InformacionBuscadorComando.js"></script>

    <!-- <script src="/LinuxDataBaseWeb/Scripts/title.js"></script> -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="buscadorweb">
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    // include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    ?>
    <!-- <div class="navbar">
        <a href="/LinuxDataBaseWeb/Principal/paginaprincipal.php" class="boton-blanco">Volver pagina principal</a>
        
        <a href="#" class="button" onclick="openLoginModal()">ingresar</a>
    </div> -->
    <form id="formularioBusqueda" class="formularioBusqueda" onmouseover="mostrarMensaje(event)" onmouseout="ocultarMensaje()">
        <label for="busqueda">Busca tu comando aquí:</label>
        <input type="text" name="busqueda" id="busqueda" required>
    </form>

    <!-- div que se mostrará al pasar el mouse por encima -->
    <div id="mensajeCursor" style="position: absolute; display: none; background-color: #fff; padding: 10px; border: 1px solid #ccc; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif;">
        <strong style="font-size: 16px;">Cómo usar el buscador:</strong>
        <ul style="list-style-type: disc; margin-top: 5px; margin-bottom: 0;">
            <li>Puedes buscar un comando directamente para ver su información</li>
            <li>Puedes buscar probando con descripciones (por ejemplo: "create file", "change directory", etc).</li>
            <li>Puedes buscar por tipo de comando ("Basic", "Configuration", etc).</li>
        </ul>
        <div style="margin-top: 20px;"></div>
        <strong style="font-size: 16px; color: green;"> Tambien prueba el Chatbot especializado en consultas de Linux, ubicado en la esquina inferior</strong>
    </div>



    <!-- div donde se generaran los resultados de la busqueda -->
    <div id="resultadosBusqueda"></div>


    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#buscador-link').addClass('active');
        });
    </script>

    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script>
    window.botpressWebChat.init({
        "composerPlaceholder": "Chat with Linux Consultor",
        "botConversationDescription": "This bot will help you with your Linux doubts",
        "botId": "c44b463a-3175-4776-a2ae-5307b2adfbb6",
        "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
        "messagingUrl": "https://messaging.botpress.cloud",
        "clientId": "c44b463a-3175-4776-a2ae-5307b2adfbb6",
        "lazySocket": true,
        "botName": "Linux Consultor",
        "avatarUrl": "https://th.bing.com/th/id/OIG.d0K0jttFyQjnNxdcBTjv?pid=ImgGn",
        "frontendVersion": "v1",
        "useSessionStorage": true,
        "enableConversationDeletion": true,
        "showPoweredBy": true,
        "theme": "prism",
        "themeColor": "#2563eb"
    });
    </script>

</body>
</html>
