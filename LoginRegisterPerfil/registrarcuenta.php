<?php
include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\navigationbar.html';
// include 'C:\xampp\htdocs\LinuxDataBaseWeb\ArquitecturaGeneral\title.html'

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registro de Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="../Styles/StyleBarraDeNavegacion.css">
    <!-- <link rel="stylesheet" type="text/css" href="../Styles/StyleTitle.css"> -->
    <link rel="stylesheet" type="text/css" href="../Styles/StyleRegistrarCuenta.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="registrarcuenta">
    <section class="login">
        <div class="form-box">
            <div class="form-value">
                <form action="enviar_verificacion.php" method="post" onsubmit="return validarRegistro();">
                    
                    
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <label for="nombre">Nombre:</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                        <label for="apellido">Apellido:</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                        <label for="correo">Correo Electrónico:</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" class="form-control" id="usuario" name="usuario" required>
                        <label for="usuario">Usuario:</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        <label for="contrasena">Contraseña:</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>
                        <label for="confirmar_contrasena">Confirmar Contraseña:</label>
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

                    <div class="inputbox">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        
                    </div>

                    <button type="submit" class="btn btn-outline-success">Registrarse</button>
                    <a href="../Principal/paginaprincipal.php" class="cta-button">Cancelar</a>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/validacionRegistro.js"></script>

    <script>
        $(document).ready(function() {
            // Puedes agregar la lógica de activar la clase para el enlace correspondiente aquí
        });
    </script>
</body>
</html>
