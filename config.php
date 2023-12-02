<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('772473523917-hb8653bnghp1p784jq502nmh06raa70f.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/LinuxDataBaseWeb/login.php/');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>


<?php
// config.php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'Luck.duocuc@gmail.com');
define('SMTP_PASSWORD', 'YWgQXlOWjiZDwv');
define('SMTP_SECURE', 'tls');
define('SMTP_FROM_EMAIL', 'Luck.duocuc@gmail.com');
define('SMTP_FROM_NAME', 'Luck verification');
?>