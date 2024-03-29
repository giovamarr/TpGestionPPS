<?php
if (isset($_GET['m'])) {
    $segui = new SeguimientosController();
    $a = $_GET['m'];
    $segui->$a();
}
class SeguimientosController
{

    public function __construct()
    {
        require_once "../models/SeguimientosModel.php";
    }

    public function insertarSeguim()
    {
        session_start();
        $segui = new SeguimientosModel();
        $idPPS = $_SESSION['idPPS'];
        $count = $segui->chequearIDparaSegui($idPPS);

        if ($count == 1) {
            $countIF = $segui->chequearsitieneIF($idPPS);
            if ($countIF == 1) {
                header('Location: ../views/AlumnoSeguimiento.php?s=1');
                exit();
            } else {
                $actividadesRealizadas = $_POST['actividadesRealizadas'];
                $actividadesProximas = $_POST['actividadesProximas'];
                $cuestionesPendientes = $_POST['cuestionesPendientes'];
                $experiencias = $_POST['experiencias'];
                $desvioCronograma = $_POST['desvioCronograma'];
                $hsTrabajadas = $_POST['hsTrabajadas'];
                $TotalhsTrabajadas = $_POST['TotalhsTrabajadas'];
                $insertado = $segui->insertarSeguimiento($actividadesRealizadas, $actividadesProximas, $cuestionesPendientes, $experiencias, $desvioCronograma, $hsTrabajadas, $TotalhsTrabajadas, $idPPS);
                if ($insertado) {
                    header('Location: ../views/AlumnoSeguimiento.php?a=1');
                    exit();
                } else {
                    header( "Location: ../views/AlumnoSeguimiento.php?d=1");
                    exit();
                }
            }
        } else {
            header('Location: ../views/AlumnoSeguimiento.php?e=1');
            exit();
        }
    }
    public function getSeguimientos()
    {

        $segui = new SeguimientosModel();
        $idPPS = $_SESSION['idPPS'];
        $seguimientos = $segui->getSegui($idPPS);
        return $seguimientos;
    }

    public function getSeguimientosDocente()
    {

        $segui = new SeguimientosModel();
        $idProf = $_SESSION['id'];
        $seguimientos = $segui->getSeguiDocente($idProf);
        return $seguimientos;
    }
    public function getSeguimientosDocenteAll()
    {

        $segui = new SeguimientosModel();
        $idProf = $_SESSION['id'];
        $seguimientos = $segui->getSeguiDocenteAll($idProf);
        return $seguimientos;
    }


    public function getOne($idSeguimientos)
    {
        $segui = new SeguimientosModel();
        $idPPS = $_SESSION['idPPS'];
        $seguimientos = $segui->getOne($idPPS, $idSeguimientos);
        return mysqli_fetch_array($seguimientos);
    }

    public function getSeguiDocente($idSeguimientos, $idPPS)
    {
        $segui = new SeguimientosModel();
        $seguimientos = $segui->getOne($idPPS, $idSeguimientos);
        return mysqli_fetch_array($seguimientos);
    }
    public function getSeguiDocenteAll($idSeguimientos, $idPPS)
    {
        $segui = new SeguimientosModel();
        $seguimientos = $segui->getOne($idPPS, $idSeguimientos);
        return mysqli_fetch_array($seguimientos);
    }

    public function aprobarSegui()
    {
        $segui = new SeguimientosModel();
        $idPPS = $_POST['idPPS'];
        $idSeguimientos = $_POST['idSeguimientos'];
        $segui->aprobarSegui($idPPS, $idSeguimientos);
        header('Location: ../views/DocenteViewReport.php');
        exit();
    }

    public function desaprobarSegui()
    {
        $segui = new SeguimientosModel();
        $idPPS = $_POST['idPPS'];
        $idSeguimientos = $_POST['idSeguimientos'];
        $mensaje = $_POST['comentario'];
        $mail = $segui->getMailUserporSegui($idPPS);
        $email = $mail['email'];
        $asunto = 'Seguimiento Desaprobado';
        $header = "From: Pagina de Gestion de PPS"  . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        mail($email, $asunto, $mensaje, $header);
        $segui->desaprobarSegui($idPPS, $idSeguimientos,$mensaje);
        header('Location: ../views/DocenteViewReport.php');
        exit();
    }

    public function getSeguimientosAdmin($idPPS)
    {
        $segui = new SeguimientosModel();
        $seguimientos = $segui->getSegui($idPPS);
        return $seguimientos;
    }
}