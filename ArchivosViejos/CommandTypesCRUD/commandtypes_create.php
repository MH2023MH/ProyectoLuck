<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de creación
    $typeName = $_POST['type_name'];

    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    $sql = "INSERT INTO Typeslinuxdb (TypeName) VALUES ('$typeName')";
    mysqli_query($conexion, $sql);

    header('Location: commandtypes_index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Tipo de Comando</title>
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

        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
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
    <h1>Agregar Tipo de Comando</h1>
    <form method="post">
        <label>Nombre del tipo de comando:</label>
        <input type="text" name="type_name" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
