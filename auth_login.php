<?php
// auth_login.php

// Verificar si la sesión no está activa
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión
    session_start();
}

// Verificar si se envió el formulario de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos ingresados por el usuario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
    }

    // Escapar los datos ingresados por el usuario para evitar ataques de SQL injection
    $username = mysqli_real_escape_string($conexion, $username);
    $password = mysqli_real_escape_string($conexion, $password);

    // Consulta SQL para buscar al usuario en la base de datos con la contraseña proporcionada
    $sql = "SELECT * FROM usuarios WHERE usuario = '$username' AND contrasena = '$password'";

    // Ejecutar la consulta
    $result = mysqli_query($conexion, $sql);

    // Verificar si se encontró un usuario con ese nombre y contraseña
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Usuario y contraseña coinciden, el usuario se ha autenticado exitosamente
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['usuario'];

        // Agregar el nombre del usuario a la sesión
        $_SESSION['nombre'] = $user['nombre']; // Asumiendo que el campo se llama "nombre" en la base de datos
        $_SESSION['id'] = $user['id'];

        $_SESSION['authenticated'] = true;

        // Actualizar la fecha de última conexión
        $sql_actualizar_ultima_conexion = "UPDATE usuarios SET fecha_ultima_conexion = NOW() WHERE usuario = '$username'";
        mysqli_query($conexion, $sql_actualizar_ultima_conexion);


        header('Location: /LinuxDataBaseWeb/SolicitudesUsuario/solicitudesactuales.php');
        exit();
    } else {
        // Usuario o contraseña incorrectos
        $_SESSION['login_error'] = "Usuario o contraseña incorrectos.";
        header('Location: /LinuxDataBaseWeb/Principal/paginaprincipal.php');
    }

    
    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
