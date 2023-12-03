<?php

session_start();
require_once 'koneksi.php';

if (isset($_SESSION['login'])) {
    header('Location: siswa/dashboard.php');
    exit();
}

if (isset($_POST["login"])) {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];

    $result = mysqli_query($db, "select * from siswa where nisn='$nisn'");

    // validasi user
    if (mysqli_num_rows($result) === 1) {

        // validasi password
        $row = mysqli_fetch_assoc($result);
        if ($nis === $row['nis']) {
            // set session
            $_SESSION['login'] = true;
            $_SESSION['nama'] = $_POST['nama'];
            $_SESSION['level'] = 'siswa';

            header("location: beres_login_siswa.php");
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
        <div class="flex flex-col gap-y-5 items-center content-center justify-center w-screen h-screen absolute z-[0]">
            <h1 class="text-4xl py-16">FORM LOGIN SISWA</h1>
            <?php if (isset($error)) : ?>
                <span class="text-red-600">Username / password salah</span>
            <?php endif; ?>
            <input type="number" placeholder="NISN" name="nisn"> <br>
            <input type="text" placeholder="NIS" name="nis"> <br>
            <input type="text" placeholder="NAMA" name="nama"> <br>
            <input type="text" placeholder="ID SPP" name="id_spp"> <br>
            <input type="submit" value="LOGIN" name="login">
            <a href="login_petugas.php"> <input type="button" value="PETUGAS" name="petugas"></a>
        </div>
    </form>
</body>

</html>