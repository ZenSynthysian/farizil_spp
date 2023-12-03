<?php
session_start();
// require_once "koneksi.php";

// if (!isset($_SESSION['login'])) {
//     header("Location: index.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    LOGIN SEBAGAI <?php echo $_SESSION['username']; ?>
    <a href="logout.php"><input type="button" value="LOGOUT"></a>
</body>

</html>