<?php
include 'C:\xampp\htdocs\LinuxDataBaseWeb\Principal\navigationbar.html';
include 'C:\xampp\htdocs\LinuxDataBaseWeb\Principal\title.html';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Buscador</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles2.css">
    <link rel="stylesheet" href="/LinuxDataBaseWeb/styles3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/AbrirVentanaModal.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/buscadorweb.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/title.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="buscadorweb">
    
    <!-- <div class="navbar">
        <a href="/LinuxDataBaseWeb/Principal/paginaprincipal.php" class="boton-blanco">Volver pagina principal</a>
        
        <a href="#" class="button" onclick="openLoginModal()">ingresar</a>
    </div> -->
    <form id="formularioBusqueda">
        <label for="busqueda">Buscar:</label>
        <input type="text" name="busqueda" id="busqueda" required>
        <!-- <button type="submit">Buscar</button> -->
    </form>

    <div id="resultadosBusqueda">
        
    </div>


    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#buscador-link').addClass('active');
        });
    </script>

</body>
</html>
