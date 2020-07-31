<?php
session_start();
if($_SESSION['type']==1){
	header('location: HomeAlumno.php');	
}elseif($_SESSION['type']==2){	
}elseif($_SESSION['type']==3){
	header('location: HomeResponsable.php');	
}else{
	header('location:../../index.php');}
?>