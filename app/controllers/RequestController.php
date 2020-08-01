<?php

class RequestController{
	
	public function __construct(){
		require_once "../models/SolicitudesModel.php";		
	}

    public function insertarPPS(){
    // Check connection
    //deberia crear un SolicitudesModel y llamar al metodo insertarSolicitudesPPS() con los parametros que traiga
	$soli=new SolicitudesModel();
	$id_user=$_SESSION['id'];
	$count =$soli->chequearID($id_user);
	if ($count == 1) {
        header('location:../views/requestPPS.php?e=1');
	} else {		
	$caractPPS = $_POST['caractPPS'];
	$nombreEntidad = $_POST['nombreEntidad'];
	$direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $localidad = $_POST['localidad'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
    $contacto = $_POST['contacto'];    
	$insertado->insertarSolicitudPPS($caractPPS, $nombreEntidad,$direccion,$cp,$localidad, $telefono, $email,$contacto,$id_user);
	if ($insertado) {
		header('location:../views/requestPPS.php?a=1');	
		} else {
			echo "Error: No se pudo enviar la solicitud de PPS<br>";
		}	
	}	
}
}
	?>