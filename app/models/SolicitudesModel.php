<?php

require '../../system/core/Conexion.php';

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

    public function insertarSolicitudPPS(){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "INSERT INTO solicitudes (caractPPS, nombreEntidad, direccion, cp, localidad, tel, emailE, contactoEntidad, id_user) VALUES ('$caractPPS', '$nombreEntidad', '$direccion','$cp','$localidad', '$telefono', '$email','$contacto',$id_user)";


    }


}