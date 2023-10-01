<?php

// perfilusuario.php
// Iniciar sesión
session_start();

// Verificar si hay un mensaje de error en la sesión
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
    unset($_SESSION['login_error']); // Limpiar el mensaje de error para no mostrarlo en futuras cargas de la página
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: paginaprincipal.php'); // Redirigir si no ha iniciado sesión
    exit();
}

// Obtener el nombre de usuario de la sesión
$nombreUsuario = $_SESSION['username'];

// Cerrar la sesión (opcional)
// session_unset();
// session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Perfil Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles2.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles3.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <title>Perfil de Usuario</title>
</head>
<body class="perfilusuario">
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    ?>
    <header>
        <h1>Bienvenido, <?php echo $nombreUsuario; ?>!</h1>
    </header>

    <main>
        <h2>Detalles del Perfil</h2>
        <p>Nombre de usuario: <?php echo $nombreUsuario; ?></p>
        <!-- Agrega más detalles del perfil aquí -->
    </main>

    <footer>
        &copy; <?php echo date("Y"); ?> LinuxWorld. Todos los derechos reservados.
    </footer>

    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#perfil-link').addClass('active');
        });
    </script>
</body>
</html>


