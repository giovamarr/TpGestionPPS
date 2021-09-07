
<?php
session_start();
if ($_SESSION['type'] == 1) {
	header('location: AlumnoHome.php');
} elseif ($_SESSION['type'] == 2) {
	header('location:DocenteHome.php');
} elseif ($_SESSION['type'] == 3) {
} else {
	header('location:../../index.php');
}
?>