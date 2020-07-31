
<?php
session_start();
if($_SESSION['type']==1){
	header('location: HomeAlumno.php');	
}elseif($_SESSION['type']==2){
	header('location:HomeDocente.php');	
}elseif($_SESSION['type']==3){
}else{
	header('location:../../index.php');}
?>