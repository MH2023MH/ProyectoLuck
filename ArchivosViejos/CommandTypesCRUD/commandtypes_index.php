<?php
// Agrega aquí la lógica para realizar las operaciones CRUD (Crear, Leer, Actualizar, Eliminar) con los tipos de comandos.
// Puedes utilizar este archivo para procesar los formularios y ejecutar las operaciones en la base de datos.
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Tipos de Comandos</title>
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

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        td {
            color: #333;
        }

        th, td, a {
            transition: background-color 0.3s;
        }

        th:hover {
            background-color: #45a049;
        }

        td a {
            display: inline-block;
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        td a:hover {
            background-color: #f44336;
        }

        /* Estilos para el formulario */
        form {
            width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>CRUD de Tipos de Comandos</h1>

    <!-- Botón para agregar un nuevo tipo de comando -->
    <a href="commandtypes_create.php" style="display: inline-block; background-color: #4CAF50; color: white; padding: 8px 16px; border: none; border-radius: 4px; margin: 20px 0; text-decoration: none;">Agregar Nuevo Tipo</a>

    <!-- Tabla para mostrar los tipos de comandos existentes -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre del Tipo</th>
            <th>Acciones</th>
        </tr>
        <?php
        // Conectar a la base de datos y obtener los tipos de comandos disponibles
        $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');
        $sql = "SELECT * FROM Typeslinuxdb";
        $result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['TypeName'] . '</td>';
            echo '<td><a href="commandtypes_edit.php?id=' . $row['id'] . '">Editar</a> <a href="commandtypes_delete.php?id=' . $row['id'] . '">Eliminar</a></td>';
            echo '</tr>';
        }
        mysqli_close($conexion);
        ?>
    </table>
</body>
</html>
