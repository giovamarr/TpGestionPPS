<?php
session_start();
if($_SESSION['type']==1){
}elseif($_SESSION['type']==2){	
	header('Location: DocenteHome.php');
	exit();
}elseif($_SESSION['type']==3){
	header('Location: ResponsableHome.php');	
	exit();
}else{
	header('Location: ../../index.php');exit();}
	