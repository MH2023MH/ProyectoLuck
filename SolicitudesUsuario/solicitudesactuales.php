<?php
session_start();

// Verificar si el usuario está correctamente autenticado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || empty($_SESSION['id'])) {
    // Redirige o muestra un mensaje de error
    die('Error: Usuario no autenticado correctamente.');
}

$usuario_id = $_SESSION['id'];

// Conectar a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
}

// Consulta para obtener las solicitudes del usuario actual
$sql = "SELECT * FROM solicitudes_comandos WHERE usuario_id = ? ORDER BY fecha_creacion DESC";

// Utilizar una consulta preparada
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $usuario_id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Verificar si hubo errores en la consulta preparada
if (!$resultado) {
    die('Error en la consulta: ' . mysqli_error($conexion));
}

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
    <link rel="stylesheet" type="text/css" href="../Styles/StylePerfilUsuario.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <title>Perfil de Usuario</title>
    <!-- Agrega enlaces a tus hojas de estilo y scripts aquí -->
</head>
<body class="perfilusuario">
    <?php
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
    include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html';
    ?>
    <h2>Mis Solicitudes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Comando</th>
                <th>Descripción</th>
                <th>Tipo de Comando</th>
                <th>Información Adicional</th>
                <th>Fecha de Creación</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Antes del bucle while que muestra las solicitudes
            $sql_tipos = "SELECT TypeName FROM Typeslinuxdb WHERE id = ?";
            $stmt_tipos = mysqli_prepare($conexion, $sql_tipos);
            mysqli_stmt_bind_param($stmt_tipos, "i", $type_id);

            // Variable para almacenar el resultado de la consulta de tipos
            $tipo_comando = "";

            while ($row = mysqli_fetch_assoc($resultado)) {
                $type_id = $row['tipo_comando'];
                mysqli_stmt_bind_param($stmt_tipos, "i", $type_id);
                mysqli_stmt_execute($stmt_tipos);
                mysqli_stmt_bind_result($stmt_tipos, $tipo_comando);
                mysqli_stmt_fetch($stmt_tipos);

                echo '<tr>';
                echo '<td>' . $row['comando'] . '</td>';
                echo '<td>' . $row['descripcion'] . '</td>';
                echo '<td>' . $tipo_comando . '</td>';
                echo '<td>' . $row['informacion_adicional'] . '</td>';
                echo '<td>' . $row['fecha_creacion'] . '</td>';
                echo '<td>' . $row['estado'] . '</td>';
                echo '</tr>';
            }

            // Cerrar la consulta preparada de tipos
            mysqli_stmt_close($stmt_tipos);
            ?>
        </tbody>
    </table>
    
    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#perfil-link').addClass('active');
        });
    </script>
</body>
</html>
