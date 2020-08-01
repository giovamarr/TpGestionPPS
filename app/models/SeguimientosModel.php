<?php


class SeguimientosModel{
    protected $idSeguimientos;
    protected $actividadesRealizadas;
    protected $actividadesProximas;
    protected $cuestionesPendientes;
    protected $experiencias;
    protected $hsTrabajadas;
    protected $TotalhsTrabajadas;
    protected $desvioCronograma;
    protected $id_PPS;
    protected $aprobadoSeg;

    public function __construct() {
        require_once '../../system/core/Conexion.php';
    }

    public function insertarSeguimiento($actividadesRealizadas, $actividadesProximas,$cuestionesPendientes,$experiencias, $desvioCronograma, $hsTrabajadas,$TotalhsTrabajadas,$idPPS){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "INSERT INTO seguimientos (actividadesRealizadas, actividadesProximas, cuestionesPendientes, experiencias, desvioCronograma, hsTrabajadas, TotalhsTrabajadas, id_PPS ) 
                VALUES ('$actividadesRealizadas', '$actividadesProximas','$cuestionesPendientes','$experiencias', '$desvioCronograma', '$hsTrabajadas','$TotalhsTrabajadas',$idPPS)";
        $result = mysqli_query($con, $query);
        return $result;
    }

    public function chequearIDparaSegui($idPPS){
        $ob = new Conexion();
        $con=$ob->conectar();
        $checkID = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS' and id_Profe IS NOT NULL";
	    $result = $con-> query($checkID);
        return $count = mysqli_num_rows($result);
    }

    public function getSegui($idP){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM seguimientos where id_PPS='$idP'";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;
    }

    public function getSeguiDocente($idProfe){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM seguimientos se inner join solicitudes s on se.id_PPS=s.idPPS inner join users u on u.id=s.id_user where s.id_Profe='$idProfe'";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;
    }



}