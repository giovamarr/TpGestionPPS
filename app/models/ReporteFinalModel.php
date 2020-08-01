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
        $ob = new Conexion();
        $con=$ob->conectar();
        $query = "INSERT INTO finalReport (conclusiones, idPPS_FP ) VALUES ('$conclusiones',$idPPS)";
        $result = mysqli_query($con, $query);
        return $result;

    }

    public function chequearsiexitePPS($idPPS){
        $ob = new Conexion();
        $con=$ob->conectar();        
        $checksiexitePPS = "SELECT * FROM solicitudes WHERE idPPS = '$idPPS'";
		$result = $con-> query($checksiexitePPS);
        return $countsiexitePPS = mysqli_num_rows($result);
    }

    public function chequearsiYaenvioFR($idPPS){
        $ob = new Conexion();
        $con=$ob->conectar();        
        $checksiYaenvioFR = "SELECT * FROM finalReport WHERE idPPS_FP = '$idPPS' ";				
        $result = $conn-> query($checksiYaenvioFR);
        return $countsiYaenvioFR = mysqli_num_rows($result);
    }

    public function getReportesFinales($idP){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM finalreport where idPPS_FP='$idP'";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;  
    }

    public function getReportesFinalesDocente($idProfe){
        $ob = new Conexion();
        $con=$ob->conectar();
        $vSql = "SELECT * FROM finalReport f inner join solicitudes s on f.idPPS_FP=s.idPPS inner join users u on u.id=s.id_user where s.id_Profe='$idProfe'";
        $vResultado = mysqli_query($con, $vSql);
        return $vResultado;  
    }


}