<?php
	if(isset($_REQUEST['m'])){
		$usercontroller=new UsuarioController();
		$a=$_REQUEST['m'];
		$usercontroller->$a();
        }
    elseif(isset($_GET['i'])==1){
        $controlador = new UsuarioController();
        $controlador->verifyLogin($_POST['email'], $_POST['password']);    
    }

require_once '../models/UsuarioModel.php';

class UsuarioController{


    public function __construct(){
        require_once '../models/UsuarioModel.php';		
	}

    public function verifyLogin($email, $password){
        session_start();
        $user=new UsuarioModel();
        $infoUsuario = $user->getUsuario($email);
        $hash=$infoUsuario['password'];
        if (password_verify($password, $hash)) {	
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $infoUsuario['nombre'];	            
            $_SESSION['ape'] = $infoUsuario['apellido'];								
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
    }	

    public function getProfesores(){
        $user = new UsuarioModel();
        $profesores = $user->getProfesores();
        return $profesores;
    }

    public function insertarUser(){
        $user=new UsuarioModel();
        
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $tipo = $_POST['tipo'];
        $infoUsuario = $user->getUsuario($email);
        if($infoUsuario){
            header('location:../views/register.php?r=1');
        } else{
            if (strcmp ($password , $password2 ) == 0) {
                        $passHash = password_hash($password, PASSWORD_DEFAULT);
                        $insertado = $user->insertUsuario($name,$surname,$email,$passHash,$tipo);
                        if ($insertado) {
                                header('location:../views/register.php?a=1');	
                            } else {
                                echo "<div class='alert alert-success mt-4' role='alert'><h3>No se pudo Insertar el Usuario</h3>
		                            <a class='btn btn-outline-primary' href='../views/login.php' role='button'>Login</a></div>";
                            }                        
                    } else {            
                        header('location:../views/register.php?e=1');
                }
            }
        
    }	

}
