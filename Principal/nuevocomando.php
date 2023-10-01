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

<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Nuevo Comando</title>
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
<body>
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    ?>

    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#newcommand-link').addClass('active');
        });
    </script>
</body>
</html>