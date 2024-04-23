<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar la eliminación del registro
    $id = $_POST['id'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "DELETE FROM commandlinuxdb WHERE id=$id";
    mysqli_query($conexion, $sql);

    header('Location: index.php');
} else {
    $id = $_GET['id'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "SELECT commandlinuxdb.id, commandlinuxdb.Command, commandlinuxdb.Description, typeslinuxdb.TypeName 
            FROM commandlinuxdb 
            JOIN typeslinuxdb ON commandlinuxdb.Type_id = typeslinuxdb.id 
            WHERE commandlinuxdb.id=$id"; // Modificamos la consulta para unir las tablas y filtrar por el ID del registro

    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);

    // Obtener los tipos de comandos disponibles para el elemento select
    $sql_tipos = "SELECT * FROM Typeslinuxdb";
    $result_tipos = mysqli_query($conexion, $sql_tipos);
    $tipos_comandos = mysqli_fetch_all($result_tipos, MYSQLI_ASSOC);
}
?>

<!-- Página de confirmación para eliminar el registro -->
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Registro</title>
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
</head>
<body class="deletecommand">
    <h1>Eliminar Registro</h1>
    <p>¿Estás seguro de que deseas eliminar este registro?</p>
    <p>
        Command: <?php echo $registro['Command']; ?><br>
        Description: <?php echo $registro['Description']; ?><br>
        Type: <?php echo $registro['TypeName']; ?> <!-- Mostramos el nombre del tipo desde la tabla typeslinuxdb -->
    </p>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
        <button type="submit">Eliminar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>

