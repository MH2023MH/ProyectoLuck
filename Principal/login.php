<?php
include 'navigationbar.html';
include 'C:\xampp\htdocs\LinuxDataBaseWeb\Principal\title.html'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="\LinuxDataBaseWeb\styles1.css">
    <link rel="stylesheet" href="\LinuxDataBaseWeb\styles2.css">
    <link rel="stylesheet" href="\LinuxDataBaseWeb\styles3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/navigationbar.js"></script>
    <script src="/LinuxDataBaseWeb/Scripts/title.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body class="login">
    <section class="login">
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label>
                      
                    </div>
                    <button>Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <script>
        $(document).ready(function() {
            // Agrega la clase "active" al enlace "Inicio"
            $('#login-link').addClass('active');
        });
    </script>
</body>
</html>