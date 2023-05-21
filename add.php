<?php

        // Check If form submitted, insert form data into users table.
        if (isset($_POST['Submit'])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']) ;
            $filename = $_FILES['image']['name'];
            
            $allowed = array('png', 'jpg', 'jpeg');

            $extension = explode('.', $filename);

            $sembarang = end($extension);

        if (in_array($sembarang, $allowed)) {
            $dummyname = $_FILES['image']['tmp_name'];

            $directory = "../img/";

            $changedirectory = move_uploaded_file($dummyname, $directory . $filename);

            // include database connection file
            include_once("config.php");

            // Insert user data into table
            $result = mysqli_query($mysqli, "INSERT INTO user(name,username,password,image) VALUES('$name','$username','$password','$filename')");
            // $_POST["alert"] = 

            // Show message when user added
            $_POST["alert"] = "User added successfully. <a href='index.php'>View Users</a>";
            }
            // print_r($_FILES);
            // die();

        }

        
        ?>

<html>


<head>
    <link rel="stylesheet" href="style.css">
    <title>Add User</title>
</head>

<body>
   <div class="container">
    <a href="index.php"><button class="button-user" role="button">Go Home</button></a>

       <div class="card">
             <form action="add.php" enctype="multipart/form-data" method="post" name="form1">
            <div class="label">
                <label for="">Name</label>
                <input type="text" name="name">
            </div>
            <div class="label">
                <label for="">Username</label>
                <input type="text" name="username">
            </div>
            <div class="label">
                <label for="">Password</label>
                <input type="password" name="password">
            </div>
            <div class="label">
                <label for="">Image</label>
                <input type="file" name="image">
            </div>
            <p><?php if (isset($_POST["alert"])) {
                echo $_POST["alert"];
            } ?></p>
            <div class="submit">
                <input type="submit" name="Submit" value="Add" role="button" class="button-submit">
            </div>
        </form>
       </div>
        
   </div>
</body>

</html>