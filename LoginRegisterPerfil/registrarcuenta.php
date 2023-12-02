<?php

require '../config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Ruta al archivo de autoload de PHPMailer

session_start(); // Iniciar sesión o continuar una sesión existente

$registro_exitoso = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de registro de usuarios
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $type_id= 1;

    // Crear un código de verificación único
    $codigo_verificacion = md5(uniqid(rand(), true));

    // Conectar a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'linuxdatabase');

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die('Error en la conexión a la base de datos: ' . mysqli_connect_error());
    }    

    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena, genero, fecha_nacimiento, usuario, Type_id, fecha_registro, fecha_ultima_conexion, codigo_verificacion)
        VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$genero', '$fecha_nacimiento', '$usuario','$type_id', NOW(), NOW(), '$codigo_verificacion')";

    if (mysqli_query($conexion, $sql)) {
        // Envía el correo de verificación
        enviarCorreoVerificacion($correo, $nombre, $codigo_verificacion);

        // Redirige o muestra un mensaje de éxito
        header('Location: registro_exitoso.php');
        exit();
    } else {
        // Manejar errores de inserción si es necesario
        echo 'Error al insertar en la base de datos: ' . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}


function enviarCorreoVerificacion($destinatario, $nombre, $codigo_verificacion) {
    $mail = new PHPMailer(true);

    try {

        // Configuración del remitente
        $mail->setFrom('Luck.duocuc@gmail.com', 'Luck verification');

        // Configuración del destinatario
        $mail->addAddress($destinatario, $nombre);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Verificación de Correo Electrónico';
        $mail->Body = "Hola $nombre,<br><br>
                       Gracias por registrarte. Por favor, haz clic en el siguiente enlace para verificar tu correo electrónico:<br>
                       <a href='../LoginRegisterPerfil/verificaremail.php?codigo=$codigo_verificacion'>Verificar Correo Electrónico</a>";

        // Enviar el correo
        $mail->send();
    } catch (Exception $e) {
        // Manejar errores de envío
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>


<!-- inicio formulario de registro de usuarios -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registro de Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/linuxDataBaseWeb/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="registrarcuenta">
    <div class="container">
        <h2>Registro de Nuevo Usuario</h2>
        <?php if (!$registro_exitoso): ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- Campos del formulario -->
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>

                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" required>
                </div>

                <div class="form-group">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>

                <div class="form-group">
                    <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                    <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
                </div>

                <div class="form-group">
                    <label>Género:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero_masculino" value="masculino" required>
                        <label class="form-check-label" for="genero_masculino">Masculino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero_femenino" value="femenino" required>
                        <label class="form-check-label" for="genero_femenino">Femenino</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genero" id="genero_otro" value="otro" required>
                        <label class="form-check-label" for="genero_otro">Otro</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>

                <button type="submit" class="btn btn-primary">Registrarse</button>
                <a href="../Principal/paginaprincipal.php" class="cta-button">Cancelar</a>
                
            </form>
        

        <?php elseif ($registro_exitoso): ?>
            <script>
                alert("Usuario registrado. ¡Bienvenido, <?php echo htmlspecialchars($nombre); ?>!");
                window.location.href = '../Principal/paginaprincipal.php';
            </script>
        <?php else: ?>
            <script>
                alert("Error, no se pudo registrar. Por favor, inténtalo nuevamente.");
                window.location.href = '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>';
            </script>
        <?php endif; ?>

    </div>

    
</body>
</html>
