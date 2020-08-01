<?php
class SolicitudesModel{
    protected $idPPS;
    protected $id_Profe;
    protected $caractPPS;
    protected $id_user;
    protected $nombreEntidad;
    protected $direccion;
    protected $localidad;
    protected $cp;
    protected $tel;
    protected $emailE;
    protected $contactoEntidad;
    protected $PPSTerminada;

    public function __construct() {
        require_once '../../system/core/Conexion.php';
    }

    public function insertarSolicitudPPS($caractPPS, $nombreEntidad,$direccion,$cp,$localidad, $telefono, $email,$contacto,$id_user){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "INSERT INTO solicitudes (caractPPS, nombreEntidad, direccion, cp, localidad, tel, emailE, contactoEntidad, id_user) 
                VALUES ('$caractPPS', '$nombreEntidad', '$direccion','$cp','$localidad', '$telefono', '$email','$contacto',$id_user)";
        $result = mysqli_query($con, $query);
        return $result;

    }

    public function chequearID($id_user){
        $ob = new Conexion();
        $con=$ob->conectar();
        $checkID = "SELECT * FROM solicitudes WHERE id_user = '$id_user' ";
	    $result = $con-> query($checkID);
        return $count = mysqli_num_rows($result);
    }


}