<?php

if (isset($_REQUEST['m'])) {
    $repo = new ReporteFinalController();
    $a = $_REQUEST['m'];
    $repo->$a();
}

class ReporteFinalController
{

    public function __construct()
    {
        require_once "../models/ReporteFinalModel.php";
    }

    public function insertarReporte()
    {
        session_start();
        $reporte = new ReporteFinalModel();
        $idPPS = $_SESSION['idPPS'];
        $exitePPS = $reporte->chequearsiexitePPS($idPPS);

        if ($exitePPS == 1) {
            $countsiYaenvioFR = $reporte->chequearsiYaenvioFR($idPPS);
            if ($countsiYaenvioFR == 1) {
                header('location:../views/AlumnoFinalReport.php?r=2');
            } else {
                $countsiTieneSeguisinaprobar = $reporte->chequearsiTieneSeguisinaprobar($idPPS);
                if ($countsiTieneSeguisinaprobar == 1) {
                    header('location:../views/AlumnoFinalReport.php?s=1');
                } else {
                    $conclusiones = $_POST['conclusiones'];
                    $insertado = $reporte->insertarReporte($conclusiones, $idPPS);
                    if ($insertado) {
                        header('location:../views/AlumnoFinalReport.php?a=1');
                    } else {
                        echo "location:../views/AlumnoFinalReport.php?d=1";
                    }
                }
            }
        } else {
            header('location:../views/AlumnoFinalReport.php?e=1');
        }
    }

    public function getReportes()
    {

        $rf = new ReporteFinalModel();
        $idPPS = $_SESSION['idPPS'];
        $reportes = $rf->getReportesFinales($idPPS);
        return $reportes;
    }

    public function getReportesDocente()
    {

        $rf = new ReporteFinalModel();
        $idProf = $_SESSION['id'];
        $reportes = $rf->getReportesFinalesDocente($idProf);
        return $reportes;
    }

    public function getReporte($idFR)
    {
        $rf = new ReporteFinalModel();
        $idPPS = $_SESSION['idPPS'];
        $reportes = $rf->getReporteFinal($idPPS, $idFR);
        return mysqli_fetch_array($reportes);
    }

    public function getReporteDocente($idFR, $idPPS)
    {
        $rf = new ReporteFinalModel();
        $reportes = $rf->getReporteFinal($idPPS, $idFR);
        return mysqli_fetch_array($reportes);
    }

    public function aprobarRF()
    {
        $rf = new ReporteFinalModel();
        $idPPS = $_POST['idPPS'];
        $idFR = $_POST['idFR'];
        $reportes = $rf->aprobarRF($idPPS, $idFR);
        header('location:../views/DocenteViewReport.php');
    }

    public function desaprobarRF()
    {
        $rf = new ReporteFinalModel();
        $idPPS = $_POST['idPPS'];
        $idFR = $_POST['idFR'];
        $mensaje = $_POST['comentario'];
        $email = $rf->getMailUserporRF($idPPS);
        $asunto = 'Reporte Final Desaprobado';
        $header = "From: Pagina de Gestion de PPS"  . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        $a = mail($email, $asunto, $mensaje, $header);
        $reportes = $rf->desaprobarRF($idPPS, $idFR,$mensaje);
        header('location:../views/DocenteViewReport.php');
    }
}