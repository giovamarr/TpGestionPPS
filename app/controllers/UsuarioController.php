<?php

require_once '../models/UsuarioModel.php';
session_start();		

$email=$_POST['email'];
$password=$_POST['password'];

$user=new UsuarioModel();
$infoUsuario = $user->getUsuario($email);
$hash=$infoUsuario['password'];
    if (password_verify($password, $hash)) {	
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $infoUsuario['nombre'];								
        $_SESSION['idPPS'] = $infoUsuario['idPPS'];				
        $_SESSION['id'] = $infoUsuario['id'];
        $_SESSION['type'] = $infoUsuario['tipo'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;		
                
        if($infoUsuario['tipo']==1){
            header('location:../views/HomeAlumno.php');	
            }elseif($infoUsuario['tipo']==2){
                header('location:../views/HomeDocente.php');	
            }elseif($infoUsuario['tipo']==3){
                header('location:../views/HomeResponsable.php');	
            }
        } else { 
            header('location:../../index.php?e=1');
        }	



?>
