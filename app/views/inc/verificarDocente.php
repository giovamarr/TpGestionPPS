<?php
session_start();
if($_SESSION['type']==1){
	header('location: AlumnoHome.php');	
}elseif($_SESSION['type']==2){	
}elseif($_SESSION['type']==3){
	header('location: ResponsableHome.php');	
}else{
	header('location:../../index.php');}
