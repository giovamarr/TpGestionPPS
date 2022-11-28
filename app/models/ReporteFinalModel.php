<?php
class ReporteFinalModel{
    protected $idFR;
    protected $idPPS_FP;
    protected $conclusiones;
    protected $aprobadaFR;

    public function __construct() {
        require_once '../../system/core/Conexion.php';
    }

    public function insertarReporte($conclusiones,$idPPS){
        if (is_numeric($conclusiones) and is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $date=date('Y-m-d');
            $query = "INSERT INTO finalreport (conclusiones, idPPS_FP,date ) VALUES ('$conclusiones',$idPPS,'$date')";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }

    public function chequearsiexitePPS($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();        
            $checksiexitePPS = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS' and id_Profe is not null";
            $vResultado = mysqli_query($con, $checksiexitePPS);
            return $countsiexitePPS = mysqli_num_rows($vResultado);
        }
    }

    public function chequearsiYaenvioFR($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();        
            $checksiYaenvioFR = "SELECT * FROM finalreport WHERE idPPS_FP = '$idPPS' ";				
            $vResultado = mysqli_query($con, $checksiYaenvioFR);
            return $countsiYaenvioFR = mysqli_num_rows($vResultado);
        }
    }
    public function chequearsiTieneSeguisinaprobar($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();        
            $TieneSeguisinaprobar = "SELECT * FROM seguimientos WHERE id_PPS = '$idPPS' and aprobadoSeg is null ";				
            $vResultado = mysqli_query($con, $TieneSeguisinaprobar);
            return $countsiTieneSeguisinaprobar = mysqli_num_rows($vResultado);
        }
    }

    public function getReportesFinales($idP){
        if (is_numeric($idP)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM finalreport where idPPS_FP='$idP'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;  
        }
    }

    public function getReportesFinalesDocente($idProfe){
        if (is_numeric($idProfe)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM finalreport f inner join solicitudes s on f.idPPS_FP=s.idPPS 
                    inner join users u on u.id=s.id_user where s.id_Profe='$idProfe' and (f.aprobadaFR is null)";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;  
        }
    }
    public function getReporteFinal($idPPS,$idFR){
        if (is_numeric($idPPS) and is_numeric($idFR)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM finalreport where idPPS_FP='$idPPS' and idFR='$idFR'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;  
        }
    }

    public function getReporteFinalAdmin($idPPS){
        if (is_numeric($idPPS)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT * FROM finalreport where idPPS_FP='$idPPS'";
            $vResultado = mysqli_query($con, $vSql);
            return $vResultado;  
        }
    }

    public function aprobarRF($idPPS,$idFR){
        if (is_numeric($idPPS) and is_numeric($idFR)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $query = "UPDATE finalreport SET aprobadaFR=1 where idPPS_FP='$idPPS' and idFR='$idFR'";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }
    public function desaprobarRF($idPPS,$idFR){
        if (is_numeric($idPPS) and is_numeric($idFR)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $query = "UPDATE finalreport SET aprobadaFR=2 , comentario='$comentario' where idPPS_FP='$idPPS' and idFR='$idFR'";
            $result = mysqli_query($con, $query);
            return $result;
        }
    }
    public function getMailUserporRF($idP){
        if (is_numeric($idP)){
            $ob = new Conexion();
            $con=$ob->conectar();
            $vSql = "SELECT u.email FROM  solicitudes s inner join users u on u.id=s.id_user where s.idPPS='$idP'";
            $rf = mysqli_query($con, $vSql);
            $vResultado=mysqli_fetch_array($rf);
            return $vResultado['email'];
        }   
    }
}