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
    public function chequearsitieneIF($idPPS){
        $ob = new Conexion();
        $con=$ob->conectar();
        $checkID = "SELECT * FROM finalReport WHERE idPPS_FP = '$idPPS'";
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

    public function getMailUserporSegui($idP){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT u.* FROM  solicitudes s inner join users u on u.id=s.id_user where s.idPPS='$idP'";
        $segui = mysqli_query($con, $vSql);
        $vResultado=mysqli_fetch_array($segui);
        return $vResultado;
    }
    

    public function getSeguiDocente($idProfe){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM seguimientos se inner join solicitudes s on se.id_PPS=s.idPPS 
                inner join users u on u.id=s.id_user where s.id_Profe='$idProfe' and (se.aprobadoSeg is null)";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;
    }

    public function getOne($idPPS,$idSeguimientos){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM seguimientos where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;
    }
    public function aprobarSegui($idPPS,$idSeguimientos){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "UPDATE seguimientos SET aprobadoSeg=1 where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
        $result = mysqli_query($con, $query);
        return $result;
    }
    public function desaprobarSegui($idPPS,$idSeguimientos){
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "UPDATE seguimientos SET aprobadoSeg=2 where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
        $result = mysqli_query($con, $query);
        return $result;
    }



}