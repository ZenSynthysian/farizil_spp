<?php

session_start();
require_once 'koneksi.php';

if (isset($_SESSION['login'])) {
	header('Location: beres_login_siswa.php');
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
	<title>apk spp</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					LOGIN SISWA
				</span>

				<form class="login100-form validate-form p-b-33 p-t-5" method="post">

					<?php if (isset($error)) : ?>
						<span>Username / password salah</span>
					<?php endif; ?>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="nisn" placeholder="NISN">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="nis" placeholder="NIS">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="nama" placeholder="Nama">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="id_spp" placeholder="ID SPP">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input type="submit" value="LOGIN" name="login">
					</div>
					<div class="container-login100-form-btn m-t-32">
						<a href="login_petugas.php"><input type="button" value="FORM LOGIN PETUGAS"></a>
					</div>

				</form>

			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>