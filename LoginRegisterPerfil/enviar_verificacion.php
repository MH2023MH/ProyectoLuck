<?php

require '../config.php';

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
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];


    //echo $correo . " " . $nombre . " " . $mensaje;


    $destinatario = $correo;
    $asunto = "completa tu registro en Luck"; 
    $cuerpo = '
        <html> 
            <head> 
                <title>Validacion registro Luck</title> 
            </head>
            <body> 
                <h1>Valida tu registro en la plataforma Luck</h1>
                <p> 
                    '.$nombre . ' ' . $asunto .'  <br>
                    <h2>Haz click en el enlace para completar tu registro  </h2>
                    <p> 
                        <a href="http://localhost/LinuxDataBaseWeb/LoginRegisterPerfil/verificaremail.php?codigo='.$codigo_verificacion.'&email='.$correo.'">
                            Verificar cuenta
                        </a> 
                    </p>
                    Su código de verificación es: '.$codigo_verificacion.' 
                </p> 
            </body>
        </html>
    ';

    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=UTF8\r\n"; 

    //dirección del remitente

    $headers .= "FROM: $nombre <$correo>\r\n";
    mail($destinatario,$asunto,$cuerpo,$headers);

    echo "Correo enviado"; 
}
    
?> 
