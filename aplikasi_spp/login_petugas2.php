<?php

session_start();
require_once 'koneksi.php';

if (isset($_SESSION['login'])) {
    header('Location: petugas/dashboard.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($db, "select * from petugas where username='$username'");

    // validasi user
    if (mysqli_num_rows($result) === 1) {

        // validasi password
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            // set session
            $_SESSION['login'] = true;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['level'] = $row['level'];

            header("location: beres_login.php");
            exit();
        }
    }
    $error = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td>username</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>password</td>
                <td>:</td>
                <td><input type="text" name="password"></td>
            </tr>
        </table>
        <input type="submit" value="KIRIM" name="login">
    </form>
</body>

</html>