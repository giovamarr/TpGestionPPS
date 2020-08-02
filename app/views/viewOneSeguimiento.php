<?php
include 'inc/verificarAlumno.php';   
require_once '../controllers/SeguimientosController.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Seguimiento </title>
	
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
				<?php if (isset($_GET['id'])){
						$se=new SeguimientosController();
						$seguimiento=$se->getOne($_GET['id']);						                 
						}else{
                            header('location: HomeAlumno.php');	
						}						
					?>
				<div class="row">
						<div class="col-lg-12">	
							<h2>Seguimiento de PPS Nº <?php echo $seguimiento['idSeguimientos']; ?></h2>
								<hr>
						</div>
				</div><!-- row 2 -->                
                <form method="post" action="" >
				<div class="row">					
					<div class="col-lg-12">
						<div class="form-group">
							<p><strong>Actividades Realizadas</strong> <input type="text" class="form-control" name="actividadesRealizadas" value="<?php echo $seguimiento['actividadesRealizadas']; ?>" readonly></p>
						</div>
						<div class="form-group">
							<p><strong>Actividades Proximas</strong>	<input type="text" class="form-control" name="actividadesProximas" value="<?php echo $seguimiento['actividadesProximas']; ?>" readonly>	</p>		
						</div>
						<div class="form-group">
							<p><strong>Cuestiones Pendientes</strong><input type="text" class="form-control" name="cuestionesPendientes" value="<?php echo $seguimiento['cuestionesPendientes']; ?>" readonly>			</p>
						 </div>
						 <div class="form-group">
						 	<p><strong>Experiencias, Compliciones y Obstáculos</strong><input type="text" class="form-control" name="experiencias" value="<?php echo $seguimiento['experiencias']; ?>" readonly>	</p>		
						 </div>	
						 <div class="form-group">
						 	<p><strong>Desvio del Cronograma</strong>	<input type="text" class="form-control" name="desvioCronograma" value="<?php echo $seguimiento['desvioCronograma']; ?>" readonly>			</p>
						</div>
						<div class="form-group">
							<p><strong>Horas Trabajadas</strong><input type="number" min="0" class="form-control" name="hsTrabajadas" value="<?php echo $seguimiento['hsTrabajadas']; ?>" readonly>		</p>	
						 </div>
						 <div class="form-group">
						 	<p><strong>Total de Horas Trabajadas</strong><input type="number" min="0" class="form-control" name="TotalhsTrabajadas" value="<?php echo $seguimiento['TotalhsTrabajadas']; ?>"  readonly></p>
						</div>
					</div><!-- col 2 -->
				</div><!-- row 3 -->

				<div class="row">					
					<div class="col-lg-12">	
						<form action="mainAlumno.php">
							<input type="button" class="btn btn-secondary btn-block" onclick="location.href='viewMyReports.php';" value="Volver" />
						</form>
					</div>					
				</div><!-- row 4 -->		
			</form>
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