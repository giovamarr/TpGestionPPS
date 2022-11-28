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
    protected $comentario;
    protected $aprobadoSeg;

    public function __construct() {
        require_once '../../system/core/Conexion.php';
    }

    public function insertarSeguimiento($actividadesRealizadas, $actividadesProximas,$cuestionesPendientes,$experiencias, $desvioCronograma, $hsTrabajadas,$TotalhsTrabajadas,$idPPS){
        if (
            strlen($actividadesRealizadas) >= 5 and strlen($actividadesProximas) >= 5 and strlen($cuestionesPendientes) >= 5 and strlen($desvioCronograma) >= 5
            and is_numeric($hsTrabajadas) and is_numeric($TotalhsTrabajadas) and is_numeric($idPPS)
        ){
            $ob = new Conexion();
            $con=$ob->conectar();
            $query = "INSERT INTO seguimientos (actividadesRealizadas, actividadesProximas, cuestionesPendientes, experiencias, desvioCronograma, hsTrabajadas, TotalhsTrabajadas, id_PPS ) 
                    VALUES ('$actividadesRealizadas', '$actividadesProximas','$cuestionesPendientes','$experiencias', '$desvioCronograma', '$hsTrabajadas','$TotalhsTrabajadas',$idPPS)";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

    public function chequearIDparaSegui($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $checkID = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS' and id_Profe IS NOT NULL";
            $result = $con-> query($checkID);
            return $count = mysqli_num_rows($result);
        }
    }
    public function chequearsitieneIF($idPPS){
        if (is_numeric($idPPS)){
        
            $ob = new Conexion();
            $con=$ob->conectar();
            $checkID = "SELECT * FROM finalreport WHERE idPPS_FP = '$idPPS'";
            $result = $con-> query($checkID);
            return $count = mysqli_num_rows($result);
        }
    }

    public function getSegui($idP){
        if (is_numeric($idP)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM seguimientos where id_PPS='$idP'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;
        }
    }

    public function getMailUserporSegui($idP){
        if (is_numeric($idP)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT u.* FROM  solicitudes s inner join users u on u.id=s.id_user where s.idPPS='$idP'";
            $segui = mysqli_query($con, $vSql);
            $vResultado=mysqli_fetch_array($segui);
            return $vResultado;
        }
    }
    

    public function getSeguiDocente($idProfe){
        if (is_numeric($idProfe)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM seguimientos se inner join solicitudes s on se.id_PPS=s.idPPS 
                    inner join users u on u.id=s.id_user where s.id_Profe='$idProfe' and (se.aprobadoSeg is null)";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;
        }
    }

    public function getSeguiDocenteAll($idProfe){
        if (is_numeric($idProfe)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM seguimientos se inner join solicitudes s on se.id_PPS=s.idPPS 
                    inner join users u on u.id=s.id_user where s.id_Profe='$idProfe'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;
        }
    }

    public function getOne($idPPS,$idSeguimientos){
        if (is_numeric($idPPS) and is_numeric($idSeguimientos)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM seguimientos where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;
        }
    }
    public function aprobarSegui($idPPS,$idSeguimientos){
        if (is_numeric($idPPS) and is_numeric($idSeguimientos)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $query = "UPDATE seguimientos SET aprobadoSeg=1 where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }
    public function desaprobarSegui($idPPS,$idSeguimientos,$comentario){
        if (is_numeric($idPPS) and is_numeric($idSeguimientos) and strlen($actividadesRealizadas) >= 3){
            $ob = new Conexion();
            $con=$ob->conectar();
            $query = "UPDATE seguimientos SET aprobadoSeg=2 , comentario='$comentario' where id_PPS='$idPPS' and idSeguimientos='$idSeguimientos'";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

}