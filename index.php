<?php
// Create database connection using config file
include_once("config.php");

session_start();

// var_dump($_SESSION['login']);
// die;

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM user ORDER BY id asc");
?>

<link rel="stylesheet" href="style.css">
<html>

<head>
    <title>Tugas Akhir</title>
</head>

<body>
    <!-- <button class="button-user" role="button"> <a href="add.php" style="text-decoration: none; color: black;">Add User</a></button>  -->
    <div class="container">
        <div class="d-flex" style="justify-content: space-between;">
            <a href="add.php" class="text-add"><button class="button-user" role="button">Add Users</button></a>
            <a href="logout.php" class="text-add"><button class="button-logout" role="button">Log Out</button></a>
        </div>


        <table width='75%' class="text-family" style="border-collapse: collapse;width: 100%;  ">

            <tr style="border-bottom: 1px solid;">
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Image</th>
                <th>Keterangan</th>
            </tr>

            <?php 
            $no = 1;
            while($user_data = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?= $no++  ?> </td>
                    <td><?= $user_data['id'] ?></td>
                    <td><?= $user_data['name'] ?></td>
                    <td><?= $user_data['username'] ?></td>
                    <td><?= $user_data['password'] ?></td>
                    <td><?= $user_data['image'] ?></td>
                    <td class="btn-edit-delete">
                        <div class="d-flex">
                            <a href="detail.php?id=<?= $user_data['id'] ?>"><button role="button" class="button-general-detail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></button></a>
                            <a href="edit.php?id=<?= $user_data['id']?>"><button class="button-general-edit" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></button></a>
                            <a class="delete" href="delete.php?id=<?= $user_data['id'] ?>"><button class="button-general-delete" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-delete"><path d="M21 4H8l-7 8 7 8h13a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"></path><line x1="18" y1="9" x2="12" y2="15"></line><line x1="12" y1="9" x2="18" y2="15"></line></svg></button></a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
            

        </table>
    </div>

</body>

</html>