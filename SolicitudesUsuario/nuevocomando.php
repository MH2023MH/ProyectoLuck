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
$nombre = $_SESSION['nombre']; // Asumiendo que el campo se llama "nombre" en el formulario de registro

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

    <link rel="stylesheet" type="text/css" href="../Styles/StyleBarraDeNavegacion.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleTitle.css">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleNuevoComando.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <title>Nuevo comando</title>
    
</head>
<body class="perfilusuario">
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    ?>
    <h2>Formulario de Solicitud de Comando</h2>
    <div id="notification" class="alert alert-success" style="display: none;">
        Solicitud enviada.
    </div>
    <form method="post">
        <label for="comando">Comando:</label>
        <input type="text" id="comando" name="comando" required><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <label for="tipo_comando">Tipo de Comando:</label>
        <select name="type_id" required>
            <?php
            // Conectar a la base de datos y obtener los tipos de comandos disponibles
            $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');
            $sql = "SELECT * FROM Typeslinuxdb";
            $result = mysqli_query($conexion, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                // Generar una opción para cada tipo de comando
                echo '<option value="' . $row['id'] . '">' . $row['TypeName'] . '</option>';
            }
            mysqli_close($conexion);
            ?>
        </select>

        <label for="info_adicional">Información Adicional:</label>
        <textarea id="info_adicional" name="info_adicional" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Enviar Solicitud">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Procesar el formulario de solicitud de comando
        $comando = $_POST['comando'];
        $descripcion = $_POST['descripcion'];
        $tipo_comando = $_POST['type_id']; // Nombre del campo del tipo de comando
        $info_adicional = $_POST['info_adicional'];
    
        $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');
    
        // Utiliza la variable $nombre en lugar de $nombreUsuario
        $sql = "INSERT INTO solicitudes_comandos (comando, descripcion, tipo_comando, informacion_adicional, usuario) 
                VALUES ('$comando', '$descripcion', '$tipo_comando', '$info_adicional', '$nombre')";
    
        if (mysqli_query($conexion, $sql)) {
            // Muestra la notificación "Solicitud enviada" si la inserción en la base de datos fue exitosa
            echo '<script>
                    document.getElementById("notification").style.display = "block";
                  </script>';
        }
        mysqli_close($conexion);
    }
    
    ?>

    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#newcommand-link').addClass('active');
        });
    </script>
</body>
</html>