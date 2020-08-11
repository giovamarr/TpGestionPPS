<?php
include 'inc/verificarDocente.php';   
require_once '../controllers/ReporteFinalController.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Informe Final </title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel="stylesheet" href="css/home.css">
  </head>

  <body>
		<div class="container">
			<div class="card">
				<div class="row">
					<?php 
						include 'inc/header.php';
					?>						
				</div><hr><!-- row 1 -->
				<?php if (isset($_GET['id']) and isset($_GET['idP'])){
						$fr=new ReporteFinalController();
						$reporte=$fr->getReporteDocente($_GET['id'],$_GET['idP']);						                 
						}else{
                           header('location: HomeAlumno.php');	
						}						
					?>
				<div class="row">
						<div class="col-lg-12">	
							<h2>Informe Final de PPS Nº <?php echo $reporte['idFR']; ?></h2>
								<hr>
						</div>
				</div><!-- row 2 -->                
					<form method="post" action="" >
                   
					<h5>Conclusiones sobre la experiencia de la PPS</h5>
				<div class="row">					
						<div class="col-lg-12">	
							<div class="form-group">
								<textarea name="conclusiones" rows="15" cols="60" readonly ><?php echo $reporte['conclusiones']; ?></textarea>
							</div>
						</div>
				</div><!-- row 3 -->
                </form>	
                <div class="row">					
						<div class="col-lg-6">	
							<form action="../controllers/ReporteFinalController.php?m=aprobarRF" method="post">
								<input type="hidden" name="idPPS" value="<?php echo $reporte['idPPS_FP']; ?>" >
								<input type="hidden" name="idFR" value="<?php echo $reporte['idFR']; ?>" >
								<button type="submit" class="btn btn-success btn-block">Aprobar</button>
							</form>
						</div>	
                        <div class="col-lg-6">	
                            <form action=".php" method="post">
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#desaprobarModal" >Desaprobar</button>
							</form>
						</div>                  					
				</div><!-- row 4 -->
				<div class="row">					
						<div class="col-lg-12"> <hr>
							<form action="Volver">
								<input type="button" class="btn btn-secondary btn-block" onclick="location.href='viewReportesDocente.php';" value="Volver" />
							</form>
						</div>						
				</div><!-- row 5 -->	                	
							
                <!----------------------Modal para agregar comentario cuando se desaprueba-------------------->

                <div class="modal" id="desaprobarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregue un comentario</h5>
                    </div>
						<form method="post" action="../controllers/ReporteFinalController.php?m=desaprobarRF">
							<div class="modal-body">								
								<div class="form-group">
									<label for="message-text" class="col-form-label">Comentario</label>
									<textarea class="form-control" name="comentario"></textarea>
								</div>
							</div>                   
							
							<div class="modal-footer">
								<input type="button" class="btn btn-secondary btn-block" data-dismiss='modal' value="Cancelar" />
								<input type="hidden" name="idPPS" value="<?php echo $reporte['idPPS_FP']; ?>" >
								<input type="hidden" name="idFR" value="<?php echo $reporte['idFR']; ?>" >
								<button type="submit" class="btn btn-primary">Enviar Comentario</button>
							</div>
						</form>                        
                   
                    </div>
                </div>
                </div>




















				<?php 
							include 'inc/footer.html';
						?>
			</div><!-- card -->
		</div><!-- container -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	