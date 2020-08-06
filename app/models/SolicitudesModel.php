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

    public function TotaldePPSsinDocente(){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM solicitudes where id_Profe IS NULL";
	    $vResultado = $con-> query($vSql);
        return $total_registros=mysqli_num_rows($vResultado);
    }

    public function getPPSPaginado($inicio,$Cant_por_Pag){
        $ob = new Conexion();
        $con=$ob->conectar();        
        $vSql = "SELECT * FROM solicitudes sol inner join users u on u.id=sol.id_user 
                WHERE sol.id_Profe IS NULL"." limit " . $inicio . "," . $Cant_por_Pag;
	    $vResultado = $con-> query($vSql);
        return $vResultado;
    }

    public function TotaldePPSAprobadas(){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM solicitudes sol INNER join finalreport fr on sol.idPPS=fr.idPPS_FP inner join users u on sol.id_user=u.id inner join users up on sol.id_Profe=up.id where fr.aprobadaFR is not null";
	    $vResultado = $con-> query($vSql);
        return $total_registros=mysqli_num_rows($vResultado);
    }

    public function getPPSAprobadasPaginado($inicio,$Cant_por_Pag){
        $ob = new Conexion();
        $con=$ob->conectar();        
        $vSql = "SELECT u.nombre,u.apellido,sol.*,up.nombre as nombreP,up.apellido as apellidoP FROM solicitudes sol INNER join finalreport fr on sol.idPPS=fr.idPPS_FP inner join users u on sol.id_user=u.id inner join users up on sol.id_Profe=up.id where fr.aprobadaFR is not null and sol.PPSTerminada is null"." limit " . $inicio . "," . $Cant_por_Pag;
	    $vResultado = $con-> query($vSql);
        return $vResultado;
    }

    public function evaluarPPS($idPPS,$valor){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "UPDATE solicitudes SET PPSTerminada='$valor' where idPPS='$idPPS'";
        $result = mysqli_query($con, $query);
        return $result;
    }

    // public function desaprobarPPS($idPPS){
    //     $ob = new Conexion();
    //     $con=$ob->conectar();
    //     $query = "UPDATE solicitudes SET PPSTerminada=2 where idPPS='$idPPS'";
    //     $result = mysqli_query($con, $query);
    //     return $result;
    // }
    // public function aprobarPPS($idPPS){
    //     $ob = new Conexion();
    //     $con=$ob->conectar();
    //     $query = "UPDATE solicitudes SET PPSTerminada=1 where idPPS='$idPPS'";
    //     $result = mysqli_query($con, $query);
    //     return $result;
    // }
 

}