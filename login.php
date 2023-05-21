<?php

    include_once("config.php");

    session_start();   


    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        // var_dump($username);
        // die;
        $result = mysqli_query($mysqli, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        // var_dump($result);
        // die;
        if ($result->num_rows == 1) {
            $_SESSION['login'] = 'true';
            header('Location: index.php');
        }
    } 

?>


<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 style="text-align:center; color: white;">Login User</h1>
            <div class="form">
                <form action="" method="post">
                    <div class="username-login">
                        <label for="">Username:</label>
                        <input required type="text" name="username" id="username">
                    </div>
                    <div class="password-login">
                        <label for="">Password:</label>
                        <input required type="password" name="password" id="password">
                    </div>
                    <div class="button-login">
                        <button class="btn-login" role="button" type="submit" name="submit" id="submit">Login</button>
                    </div>
                    <div class="register" style="color: white;">
                        <p>belum punya akun? <a href="register.php" style="font-weight: 600; text-decoration:none ;color: #0062cc;" >Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>