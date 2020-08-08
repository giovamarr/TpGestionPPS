<?php
if(isset($_REQUEST['m'])){
    $segui=new SeguimientosController();
    $a=$_REQUEST['m'];
    $segui->$a();
    }
class SeguimientosController{
	
	public function __construct(){
		require_once "../models/SeguimientosModel.php";		
	}

    public function insertarSeguim(){
        session_start();
        $segui=new SeguimientosModel();
        $idPPS=$_SESSION['idPPS'];
        $count =$segui->chequearIDparaSegui($idPPS);

        if ($count == 1) {

        $actividadesRealizadas = $_POST['actividadesRealizadas'];
        $actividadesProximas = $_POST['actividadesProximas'];
        $cuestionesPendientes = $_POST['cuestionesPendientes'];
        $experiencias = $_POST['experiencias'];
        $desvioCronograma = $_POST['desvioCronograma'];
        $hsTrabajadas = $_POST['hsTrabajadas'];
        $TotalhsTrabajadas = $_POST['TotalhsTrabajadas'];  
        $insertado =$segui->insertarSeguimiento($actividadesRealizadas, $actividadesProximas,$cuestionesPendientes,$experiencias, $desvioCronograma, $hsTrabajadas,$TotalhsTrabajadas,$idPPS);
        if ($insertado) {
            header('location:../views/formSeguimiento.php?a=1');	
            } else {
                echo "Error: No se pudo enviar el Seguimiento.<br>";
            }
        } else {	
            header('location:../views/formSeguimiento.php?e=1');		
        }
    }

    public function getSeguimientos(){
        
        $segui=new SeguimientosModel();
        $idPPS=$_SESSION['idPPS'];
        $seguimientos =$segui->getSegui($idPPS);
        return $seguimientos;
    }

    public function getSeguimientosDocente(){
        
        $segui=new SeguimientosModel();
        $idProf=$_SESSION['id']; 
        $seguimientos =$segui->getSeguiDocente($idProf);
        return $seguimientos;
    }
    public function getOne($idSeguimientos){        
        $segui=new SeguimientosModel();
        $idPPS=$_SESSION['idPPS'];
        $seguimientos =$segui->getOne($idPPS,$idSeguimientos);
        return mysqli_fetch_array($seguimientos);
    }

    public function getSeguiDocente($idSeguimientos,$idPPS){        
        $segui=new SeguimientosModel();
        $seguimientos =$segui->getOne($idPPS,$idSeguimientos);
        return mysqli_fetch_array($seguimientos);
    }
  
    public function enviarMail($email,$asunto,$mensaje){
		$header="From: Pagina de Gestion de PPS"  ."\r\n";
		$header.="X-Mailer: PHP/".phpversion();
		$a=mail($email,$asunto,$mensage,$header);
	  }
  
    public function aprobarSegui(){        
        $segui=new SeguimientosModel();
        $idPPS=$_POST['idPPS'];
        $idSeguimientos=$_POST['idSeguimientos'];
        $segui->aprobarSegui($idPPS,$idSeguimientos);
        header('location:../views/viewReportesDocente.php');	
    }

    public function desaprobarSegui(){        
        $segui=new SeguimientosModel();        
        $idPPS=$_POST['idPPS'];
        $idSeguimientos=$_POST['idSeguimientos'];
        $comentario=$_POST['comentario'];
        //tiene q enviar comentario en un mail
        $segui->desaprobarSegui($idPPS,$idSeguimientos);
        header('location:../views/viewReportesDocente.php');
    }
}

//$controlador = new SeguimientosController();
//$controlador->insertarSeguim();
	?>