<?php

    include_once("config.php");

    session_start();   


    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_verif = $_POST['password_verif'];
        
        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($result)) {
            echo "
                <script>
                    alert('Username sudah digunakan')
                </script>
            ";
            return false;
        }

        if ($password !== $password_verif) {
            echo "
                <script>
                    alert('Password tidak sama')
                </script>
            ";
            return false;
        }
        

        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($mysqli, "INSERT INTO admin(username,password) VALUES('$username','$password')");   

        $register = mysqli_affected_rows($mysqli);
        if ($register > 0) {
            
            echo "
            <script>
            alert('Sukses melakukan registrasi')
            </script>
            ";
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
            <h1 style="text-align:center; color: white;">Register</h1>
            <div class="form">
                <form action="" method="post">
                    <div class="username-login">
                        <label for="">Nama:</label>
                        <input required type="text" name="name" id="name">
                    </div>
                    <div class="username-login">
                        <label for="">Username:</label>
                        <input required type="text" name="username" id="username">
                    </div>
                    <div class="password-login">
                        <label for="">Password:</label>
                        <input required type="password" name="password" id="password">
                    </div>
                    <div class="password-login">
                        <label for="">Verifikasi Password:</label>
                        <input required type="password" name="password_verif" id="password">
                    </div>
                    <div class="button-login">
                        <button class="btn-login" role="button" type="submit" name="submit" id="submit">Login</button>
                    </div>
                    <div class="register" style="color: white;">
                        <p>sudah punya akun? <a href="login.php" style="font-weight: 600; text-decoration:none ;color: #0062cc;" >Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>