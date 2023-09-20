<?php
// perfilusuario.php

// Iniciar sesión
session_start();

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/linuxDataBaseWeb/styles.css">
    <title>Perfil de Usuario</title>
</head>
<body class="perfilusuario">
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
</body>
</html>

