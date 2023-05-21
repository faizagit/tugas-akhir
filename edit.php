<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $filename = $_FILES['image']['name'];
    // var_dump($filename);
    // die;
    $allowed = array('png', 'jpg', 'jpeg');

    $extension = explode('.', $filename);

    $sembarang = end($extension);
    

    // update user data
    $result = mysqli_query($mysqli, "UPDATE user SET name='$name',username='$username',password='$password',image='$filename' WHERE id='$id'");



    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

while ($user_data = mysqli_fetch_array($result)) {
    // $name = $user_data['id'];
    $name = $user_data['name'];
    $username = $user_data['username'];
    $password = $user_data['password'];
    $image = $user_data['image'];
}
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit User Data</title>
</head>

<body>
    <div class="container">
        <a href="index.php"><button class="button-user" role="button">Home</button></a>

        <div class="card">
            <form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
           <div class="label">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $name ?>">
           </div>
            <div class="label">
                <label for="">Username</label>
                <input type="text" name="username" value="<?= $username ?>">
            </div>
            <div class="label">
                <label for="">Password</label>
                <input type="password" name="password" value="<?= $password ?>">
            </div>
            <div class="label">
                <label for="">Image</label>
                <input type="file" name="image">
                <img src="/img/<?= $image ?>" alt="" style="max-width: 50%; border: 2px solid white; margin-top: 10px; border-radius: 5px">
            </div>
            <p></p>
            <div class="submit">
                <input type="hidden" name="id" value=<?= $_GET['id']; ?>>
                <input type="submit" name="update" value="Update" class="button-submit submit" role="button">
            </div>
                </table>
            </form>
        </div>
    </div>
</body>

</html>