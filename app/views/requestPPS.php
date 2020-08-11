<?php
include 'inc/verificarAlumno.php'
?>
<!doctype html>
<html lang="es">
  <head>
    <title>SOLICITUD INICIAL DE PPS</title>
	
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
						<h2>Solicitud Inicial de PPS</h2>
							<hr>
					</div>
				</div><!-- row 2 -->
			<form method="post" action="../controllers/requestController.php?m=insertarPPS" >
				<h5>Datos de la Entidad/Organización/Institución</h5>
				<div class="row">					
					<div class="col-lg-6">
						<div class="form-group">
							<input type="text" class="form-control" name="caractPPS" placeholder="Característica PPS" required>
						</div>	
						<div class="form-group">
							<input type="text" class="form-control" name="nombreEntidad" placeholder="Nombre de la Entidad" required>			
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="direccion" placeholder="Dirección" required>			
						 </div>
						 <div class="form-group">
							<input type="text" class="form-control" name="cp" placeholder="Correo Postal" required>			
						 </div>
						
					</div><!-- col 1 -->
					<div class="col-lg-6">	
					<div class="form-group">
							<input type="text" class="form-control" name="localidad" placeholder="Localidad" required>			
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="telefono" placeholder="Teléfono" required>			
						 </div>
						 <div class="form-group">
							 <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Mail del contacto" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="contacto" placeholder="Persona de contacto de la Entidad" required>
						</div>
					</div><!-- col 2 -->
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
				echo '<p><strong><span style="color: #ff0000;">Usted ya tiene una solicitud PPS en curso</span></strong></p>';
					}elseif(isset($_GET['a'])==1){
						echo '<p><span style="color: #00ff00;"><strong>Solicitud enviada correctamente</strong></span></p>';
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