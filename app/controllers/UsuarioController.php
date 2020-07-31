<?php
require '../models/UsuarioModel.php';


class UsuarioController{

    public function verifyLogin($email, $password){
        session_start();
        $user=new UsuarioModel();
        $infoUsuario = $user->getUsuario($email);
        $hash=$infoUsuario['password'];
        if (password_verify($password, $hash)) {	
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $infoUsuario['nombre'];								
            //$_SESSION['idPPS'] = $row['idPPS'];				
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
    }

}

$controlador = new UsuarioController();
$controlador->verifyLogin($_POST['email'], $_POST['password']);

/*
if (password_verify($_POST['password'], $hash)) {	
				
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $row['nombre'];								
    $_SESSION['idPPS'] = $row['idPPS'];				
    $_SESSION['id'] = $row['id'];
    $_SESSION['type'] = $row['tipo'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
        
    
    if($row['tipo']==1){
        header('location:../views/Home.php');	
    }elseif($row['tipo']==2){
        header('location:../../views/mainDocente.php');	
    }elseif($row['tipo']==3){
        header('location:../../resources/views/mainResponsable.php');	
    }

} else { 
    header('location:../../index.php?e=1');
}	
*/

?>
