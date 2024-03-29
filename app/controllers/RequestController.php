<?php
if (isset($_GET['m'])) {
	$Request = new RequestController();
	$a = $_GET['m'];
	$Request->$a();
}


class RequestController
{
	public function __construct()
	{
		require_once "../models/SolicitudesModel.php";
	}

	public function insertarPPS()
	{
		session_start();
		$soli = new SolicitudesModel();
		$id_user = $_SESSION['id'];
		$count = $soli->chequearID($id_user);
		if ($count == 1) {
			header('Location: ../views/AlumnoRequestPPS.php?e=1');
			exit();
		} else {

			$caractPPS = $_POST['caractPPS'];
			$nombreEntidad = $_POST['nombreEntidad'];
			$direccion = $_POST['direccion'];
			$cp = $_POST['cp'];
			$localidad = $_POST['localidad'];
			$telefono = $_POST['telefono'];
			$email = $_POST['email'];
			$contacto = $_POST['contacto'];
			$insertado = $soli->insertarSolicitudPPS($caractPPS, $nombreEntidad, $direccion, $cp, $localidad, $telefono, $email, $contacto, $id_user);
			if ($insertado) {
				header('Location: ../views/AlumnoRequestPPS.php?a=1');
				exit();
			} else {
				echo "Error: No se pudo enviar la solicitud de PPS<br>";
			}
		}
	}
	public function totalPags($Cant_por_Pag)
	{

		$soli = new SolicitudesModel();
		$total = $soli->TotaldePPSsinDocente();
		return $total_paginas = ceil($total / $Cant_por_Pag);
	}
	public function getSolicitud()
	{
		$soli = new SolicitudesModel();
		$id_user = $_SESSION['id'];
		$vResultado = $soli->getSolicitud($id_user);
		return $vResultado;
	}

	public function chequearHoras(){
        $rf = new SolicitudesModel();
        $idPPS = $_SESSION['idPPS'];
        $horas = $rf->chequearHoras($idPPS);
		if($horas){
			if (mysqli_num_rows($horas) == 0){ return false;}
			else{
			$var =mysqli_fetch_array($horas);
			if ($var['Horas']<200) {
				return false;
			}else return true;
			}   
		}else{
            return false;
		}
          
    }

	public function getPPSPaginadosinProfe($inicio, $Cant_por_Pag)
	{
		$soli = new SolicitudesModel();
		$vResultado = $soli->getPPSPaginado($inicio, $Cant_por_Pag);
		return $vResultado;
	}

	public function totalPagsPPSAprobadas($Cant_por_Pag)
	{

		$soli = new SolicitudesModel();
		$total = $soli->TotaldePPSAprobadas();
		return $total_paginas = ceil($total / $Cant_por_Pag);
	}

	public function getPPSAprobadasPaginado($inicio, $Cant_por_Pag)
	{
		$soli = new SolicitudesModel();
		$vResultado = $soli->getPPSAprobadasPaginado($inicio, $Cant_por_Pag);
		return $vResultado;
	}

	public function getPPSAprobadasFechaPaginado($inicio, $month, $year,  $Cant_por_Pag)
	{
		$soli = new SolicitudesModel();
		$vResultado = $soli->getPPSAprobadasFechaPaginado($inicio, $month, $year, $Cant_por_Pag);
		return $vResultado;
	}

	public function evaluarPPS()
	{
		$soli = new SolicitudesModel();
		$idPPS = $_POST['idPPS'];
		$valor = $_POST['valor'];
		$comentario = $_POST['comentario'];
		$req = $soli->evaluarPPS($idPPS, $valor,$comentario);
		if ($valor == 1) {
			$header = "From: Pagina de Gestion de PPS"  . "\r\n";
			$header .= "X-Mailer: PHP/" . phpversion();

			$asunto = 'PPS Aprobada';
			$mensaje = 'La PPS Nº ' . $idPPS . ' fue aprobada.
					Visite la Pagina para mas Información';
			$emailalumno = $soli->getMailUserAlumno($idPPS);
			$emailProfe = $soli->getMailUserDocente($idPPS);

			mail($emailalumno, $asunto, $mensaje, $header);
			mail($emailProfe, $asunto, $mensaje, $header);
		} elseif ($valor == 2) {
			$header = "From: Pagina de Gestion de PPS"  . "\r\n";
			$header .= "X-Mailer: PHP/" . phpversion();

			$asunto = 'PPS Desaprobada';
			$mensaje = 'La PPS Nº ' . $idPPS . ' fue desaprobada.
					Visite la Pagina para mas Información';
			$emailalumno = $soli->getMailUserAlumno($idPPS);
			$emailProfe = $soli->getMailUserDocente($idPPS);

			mail($emailalumno, $asunto, $mensaje, $header);
			mail($emailProfe, $asunto, $mensaje, $header);
		}

		header('Location: ../views/ResponsableRegisterAprovedPPS.php');
        exit();
	}

	public function elegirProfesor()
	{
		$soli = new SolicitudesModel();
		$idPPS = $_POST['idPPS'];
		$idProfe = $_POST['idProfe'];
		$soli->elegirProfesor($idPPS, $idProfe);
		header('Location: ../views/PublicViewSuccess.php');
        exit();
	}
	public function enviarMail($email, $asunto, $mensaje)
	{
		$header = "From: Pagina de Gestion de PPS"  . "\r\n";
		$header .= "X-Mailer: PHP/" . phpversion();
		$a = mail($email, $asunto, $mensaje, $header);
	}

	public function TotaldePPSParaDocente($Cant_por_Pag)
	{
		//session_start();
		$soli = new SolicitudesModel();
		$idProfe = $_SESSION['id'];
		$total = $soli->TotaldePPSParaDocente($idProfe);
		return $total_paginas = ceil($total / $Cant_por_Pag);
	}

	public function getPPSPaginadoParaDocente($inicio, $Cant_por_Pag)
	{
		$soli = new SolicitudesModel();
		$idProfe = $_SESSION['id'];
		$vResultado = $soli->getPPSPaginadoParaDocente($inicio, $Cant_por_Pag, $idProfe);
		return $vResultado;
	}
}