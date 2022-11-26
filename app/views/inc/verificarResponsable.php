<?php
session_start();
if ($_SESSION['type'] == 1) {
	header('Location: AlumnoHome.php');
	exit();
} elseif ($_SESSION['type'] == 2) {
	header('Location: DocenteHome.php');
	exit();
} elseif ($_SESSION['type'] == 3) {
} else {
	header('Location: ../../index.php');
	exit();
}
?>