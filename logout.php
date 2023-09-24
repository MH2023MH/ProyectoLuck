<?php

// //logout.php

// include('config.php');

// //Reset OAuth access token
// $google_client->revokeToken();

// //Destroy entire session data.
// session_destroy();

// //redirect page to index.php
// header('location:/LinuxDataBaseWeb/Principal/paginaprincipal.php');

?>


<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario a la página principal
header('Location: /LinuxDataBaseWeb/Principal/paginaprincipal.php');
exit();
?>
