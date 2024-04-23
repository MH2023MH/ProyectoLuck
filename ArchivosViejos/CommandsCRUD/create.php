<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de creación
    $command = $_POST['command'];
    $description = $_POST['description'];
    $type_id = $_POST['type_id']; // Cambiamos el nombre del campo a 'type_id'

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "INSERT INTO commandlinuxdb (Command, Description, Type_id) VALUES ('$command', '$description', '$type_id')";
    mysqli_query($conexion, $sql);

    header('Location: index.php');
}
?>

<!-- Formulario para agregar un nuevo registro -->
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Registro</title>
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
</head>
<body class="createcommand">
    <h1>Agregar Registro</h1>
    <form method="post">
        <!-- Campo de Command -->
        <label>Command:</label>
        <input type="text" name="command" required><br>

        <!-- Campo de Description -->
        <label>Description:</label>
        <input type="text" name="description" required><br>

        <!-- Campo de Type -->
        <label>Type:</label>
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
        
        <!-- Enlace para abrir la nueva pestaña para el CRUD de los tipos de comandos -->
        <a href="/LinuxDataBaseWeb/CommandTypesCRUD/commandtypes_index.php" target="_blank">Administrar tipos de comandos</a>
        
        <!-- Botón para guardar el registro -->
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
