<?php
include 'inc/verificarAlumno.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Informe Final de PPS</title>
	
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

				<div class="row">
						<div class="col-lg-12">	
							<h2>Formulario de Informe Final de PPS</h2>
								<hr>
						</div>
				</div><!-- row 2 -->
					<form method="post" action="../controllers/ReporteFinalController.php?m=insertarReporte" >
					<h5>Conclusiones sobre la experiencia de la PPS</h5>
				<div class="row">					
						<div class="col-lg-12">	
							<div class="form-group">
								<textarea name="conclusiones" rows="15" cols="75" placeholder="Escribe aquí su Conclusión" required></textarea>
							</div>
						</div>
				</div><!-- row 3 -->

				<div class="row">					
						<div class="col-lg-6">	
							<form action="mainAlumno.php">
								<input type="button" class="btn btn-secondary btn-block" onclick="location.href='HomeAlumno.php';" value="Cancelar" />
							</form>
						</div>
						<div class="col-lg-6">	
							<button type="submit" class="btn btn-success btn-block"> Enviar</button>
						</div>
				</div><!-- row 4 -->		
				</form>
				<?php if (isset($_GET['e'])==1){
					echo '<p><strong><span style="color: #ff0000;">No tiene una PPS en curso o todavia no se le ha asignado un Profesor.</span></strong></p>';
						}elseif(isset($_GET['r'])==1){
							echo '<p><span style="color: #ff0000;"><strong>Usted ya ha enviado un Informe Final.</strong></span></p>';
						}elseif(isset($_GET['a'])==1){
							echo '<p><span style="color: #00ff00;"><strong>Informe Final enviado correctamente</strong></span></p>';
						}elseif(isset($_GET['d'])==1){
							echo '<p><span style="color: #ff0000;"><strong>No se puedo enviar el informe, intente de nuevo mas tarde.</strong></span></p>';
						}elseif(isset($_GET['s'])==1){
							echo '<p><span style="color: #ff0000;"><strong>Espere que sus seguimientos sean calificados.</strong></span></p>';
						}
				?>
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