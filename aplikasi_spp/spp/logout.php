<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("location: login_siswa.php");
exit();
