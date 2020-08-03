<?php

class ReporteFinalController{
	
	public function __construct(){
		require_once "../models/ReporteFinalModel.php";		
	}

    public function insertarReporte(){
        
        $reporte=new ReporteFinalModel();
        $idPPS=$_SESSION['idPPS'];
        $exitePPS =$reporte->chequearsiexitePPS($idPPS);     

        if ($exitePPS == 1) {
            $countsiYaenvioFR = $reporte->chequearsiYaenvioFR($idPPS);
            if ($countsiYaenvioFR == 1) {
                    header('location:../views/formFinalReport.php?r=2');
                    }else{
                        $conclusiones = $_POST['conclusiones'];
                        $insertado=$reporte->insertarReporte($conclusiones,$idPPS);
                        if ($insertado) {
                            header('location:../views/formFinalReport.php?a=1');
                        } else {
                            echo "Error: No se pudo enviar el Reporte.<br>";
                        }
                    }			
        } else {	
            header('location:../views/formFinalReport.php?e=1');		
        }	
        
    }
    public function getReportes(){

        $rf=new ReporteFinalModel();
        $idPPS=$_SESSION['idPPS'];
        $reportes =$rf->getReportesFinales($idPPS);
        return $reportes;
    }

    public function getReportesDocente(){
        
        $rf=new ReporteFinalModel();
        $idProf=$_SESSION['id']; 
        $reportes =$rf->getReportesFinalesDocente($idProf);
        return $reportes;
    }

    public function getReporte($idFR){
        $rf=new ReporteFinalModel();
        $idPPS=$_SESSION['idPPS'];
        $reportes =$rf->getReporteFinal($idPPS,$idFR);
        return mysqli_fetch_array($reportes);
    }

    public function getReporteDocente($idFR,$idPPS){
        $rf=new ReporteFinalModel();
        $reportes =$rf->getReporteFinal($idPPS,$idFR);
        return mysqli_fetch_array($reportes);
    }
    
    public function aprobarRF($idPPS,$idFR){        
        $rf=new ReporteFinalModel();
        $reportes =$rf->aprobarRF($idPPS,$idFR);
    }

    public function desaprobarRF($idPPS,$idFR){        
        $rf=new ReporteFinalModel();
        $reportes =$rf->desaprobarRF($idPPS,$idFR);
    }

}
	?>