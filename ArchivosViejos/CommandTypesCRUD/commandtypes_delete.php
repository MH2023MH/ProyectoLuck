<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar la eliminación del tipo de comando
    $id = $_POST['id'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    // Verificar si el tipo de comando está siendo utilizado por algún comando
    $sql_check_comandos = "SELECT * FROM commandlinuxdb WHERE Type_id = $id";
    $resultado_check_comandos = mysqli_query($conexion, $sql_check_comandos);

    if (mysqli_num_rows($resultado_check_comandos) > 0) {
        // El tipo de comando está siendo utilizado, mostrar mensaje de advertencia
        $mensaje = "No se puede eliminar el tipo de comando porque está siendo utilizado por uno o más comandos.";
    } else {
        // El tipo de comando no está siendo utilizado, proceder con la eliminación
        $sql = "DELETE FROM Typeslinuxdb WHERE id=$id";
        mysqli_query($conexion, $sql);
        header('Location: commandtypes_index.php');
    }
} else {
    $id = $_GET['id'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "SELECT * FROM Typeslinuxdb WHERE id=$id";
    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Tipo de Comando</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"], a {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        button[type="submit"]:hover, a:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Eliminar Tipo de Comando</h1>
    <?php if (isset($mensaje)) { ?>
        <p style="color: red;"><?php echo $mensaje; ?></p>
        <a href="commandtypes_index.php">Volver</a>
    <?php } else { ?>
        <p>¿Estás seguro de que deseas eliminar este tipo de comando?</p>
        <p>
            Nombre del tipo de comando: <?php echo $registro['TypeName']; ?>
        </p>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <button type="submit">Eliminar</button>
            <a href="commandtypes_index.php">Cancelar</a>
        </form>
    <?php } ?>
</body>
</html>
