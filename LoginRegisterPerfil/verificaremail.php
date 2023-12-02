<?php
// verificar.php
session_start();

if ($_GET['codigo']) {
    $codigo_verificacion = $_GET['codigo'];

    // Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    if (!$conexion) {
        die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
    }

    $sql = "UPDATE usuarios SET verificado = 1 WHERE codigo_verificacion = '$codigo_verificacion'";
    mysqli_query($conexion, $sql);

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    // Redirige o muestra un mensaje de éxito
    header('Location: verificacion_exitosa.php');
    exit();
}
?>
