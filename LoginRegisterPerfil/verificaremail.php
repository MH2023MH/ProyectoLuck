<?php

session_start();

// Definir la variable $correo para evitar la advertencia de "Undefined variable"
$correo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo_verificacion = $_POST['codigo'];
    $correo = $_POST['email'];

    // Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    if (!$conexion) {
        die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
    }

    // Utiliza sentencia preparada para evitar SQL Injection
    $sql = "UPDATE usuarios SET verificado = 1 WHERE codigo_verificacion = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $codigo_verificacion);

    // Ejecutar la sentencia preparada
    mysqli_stmt_execute($stmt);

    // Verificar si se afectó alguna fila
    $filas_afectadas = mysqli_stmt_affected_rows($stmt);

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);

    if ($filas_afectadas > 0) {
        // Mostrar un mensaje de éxito
        echo "Verificación exitosa. ¡Tu cuenta ha sido validada!";
    } else {
        // Mostrar un mensaje de error
        echo "Código de verificación no válido. Por favor, intenta nuevamente.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Verifica tu cuenta</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Styles/StyleVerificarEmail.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center" style="margin-top:15%">
            <form class="col-3" action="" method="POST">
                <h2>Verificar Cuenta</h2>
                <div class="mb-3">
                    <label for="c" class="form-label">Codigo de Verificación enviado al correo</label>
                    <input type="text" class="form-control" id="c" name="codigo" required>
                    <input type="hidden" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($correo);?>">
                </div>

               
                <button type="submit" class="btn btn-primary">Verificar</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
