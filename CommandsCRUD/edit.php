<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de edición
    $id = $_POST['id'];
    $command = $_POST['command'];
    $description = $_POST['description'];
    $type_id = $_POST['type_id']; // Cambiamos el nombre del campo a 'type_id'

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "UPDATE commandlinuxdb SET Command='$command', Description='$description', Type_id='$type_id' WHERE id=$id";
    mysqli_query($conexion, $sql);

    header('Location: index.php');
} else {
    $id = $_GET['id'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "SELECT * FROM commandlinuxdb WHERE id=$id";
    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);

    // Obtener los tipos de comandos disponibles para el elemento select
    $sql_tipos = "SELECT * FROM Typeslinuxdb";
    $result_tipos = mysqli_query($conexion, $sql_tipos);
    $tipos_comandos = mysqli_fetch_all($result_tipos, MYSQLI_ASSOC);
}
?>

<!-- Formulario para editar la información del registro -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
</head>
<body class="editcommand">
    <h1>Editar Registro</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
        <label>Command:</label>
        <input type="text" name="command" value="<?php echo $registro['Command']; ?>" required><br>
        <label>Description:</label>
        <input type="text" name="description" value="<?php echo $registro['Description']; ?>" required><br>
        <label>Type:</label>
        <select name="type_id" required> <!-- Cambiamos el campo a un elemento select -->
            <?php
            foreach ($tipos_comandos as $tipo) {
                // Generar una opción para cada tipo de comando
                $selected = ($registro['Type_id'] == $tipo['id']) ? 'selected' : '';
                echo '<option value="' . $tipo['id'] . '" ' . $selected . '>' . $tipo['TypeName'] . '</option>';
            }
            ?>
        </select><br>


        <!-- Enlace para abrir la nueva pestaña para el CRUD de los tipos de comandos -->
        <a href="/LinuxDataBaseWeb/CommandTypesCRUD/commandtypes_index.php" target="_blank">Administrar tipos de comandos</a>

        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>

