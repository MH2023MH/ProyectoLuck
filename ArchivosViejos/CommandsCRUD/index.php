<?php
// Conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

// Verificar la conexión a la base de datos
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener todos los registros con los tipos de comandos
$sql = "SELECT commandlinuxdb.id, commandlinuxdb.Command, commandlinuxdb.Description, typeslinuxdb.TypeName 
        FROM commandlinuxdb 
        JOIN typeslinuxdb ON commandlinuxdb.Type_id = typeslinuxdb.id"; // Modificamos la consulta para unir las tablas

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta se ejecutó correctamente
if (!$resultado) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD en PHP</title>
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
</head>
<body class="index">
    <h1>Linux Commands Data Base</h1>
    <a href="create.php">Agregar Registro</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Command</th>
            <th>Description</th>
            <th>Type</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['Command']; ?></td>
            <td><?php echo $fila['Description']; ?></td>
            <td><?php echo $fila['TypeName']; ?></td> <!-- Mostramos el nombre del tipo desde la tabla typeslinuxdb -->
            <td>
                <a href="edit.php?id=<?php echo $fila['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
