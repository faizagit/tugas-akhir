<?php

  require 'config.php';

  $id = $_GET['id'];

  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE id = '$id'");

  $data = mysqli_fetch_object($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Detail</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="back">
                <a class="backinanger" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left-circle"><circle cx="12" cy="12" r="10"></circle><polyline points="12 8 8 12 12 16"></polyline><line x1="16" y1="12" x2="8" y2="12"></line></svg></a>
            </div>
            <div class="header">
                <h1 style="text-align: center; font-size:50px; color:white; margin-top: 10px !important;">Detail</h1>
            </div>
            <div class="body">
                <img width="100%" class="img" style="border-radius: 10px;" src="/img/<?= $data->image ?>" alt="">
                <div class="d-flex bening">
                    <p class="kandel"> ID: </p>
                    <p> <?= $data->id ?> </p>
                </div>
                <div class="d-flex bening">
                    <p class="kandel"> Name: </p>
                    <p> <?= $data->name ?> </p>
                </div>
                <div class="d-flex bening">
                    <p class="kandel"> Username: </p>
                    <p> <?= $data->username ?> </p>
                </div>
                <div class="d-flex bening">
                    <p class="kandel"> Password: </p>
                    <p> <?= $data->password ?> </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>