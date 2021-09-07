<?php
if (isset($_REQUEST['m'])) {
	$Request = new RequestController();
	$a = $_REQUEST['m'];
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
			header('location:../views/AlumnoRequestPPS.php?e=1');
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
				header('location:../views/AlumnoRequestPPS.php?a=1');
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

	public function evaluarPPS()
	{
		$soli = new SolicitudesModel();
		$idPPS = $_POST['idPPS'];
		$valor = $_POST['valor'];
		$req = $soli->evaluarPPS($idPPS, $valor);
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

		header('location:../views/PublicViewSuccess.php');
	}

	public function elegirProfesor()
	{
		$soli = new SolicitudesModel();
		$idPPS = $_POST['idPPS'];
		$idProfe = $_POST['idProfe'];
		$soli->elegirProfesor($idPPS, $idProfe);
		header('location:../views/PublicViewSuccess.php');
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
