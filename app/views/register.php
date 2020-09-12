<!doctype html>

<html lang="es">
  <head>
    <title>Crear cuenta</title>
    
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="css/login.css">
  </head>
  <body>
	  <div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">	
					<div class="card">
							<h2>Crea tu cuenta</h2><hr />	
							<form method="post" action="../controllers/UsuarioController.php?m=insertarUser" >
								<div class="form-group">	
									<input type="text" class="form-control" name="name" placeholder="Nombre" required>			
								 </div>
								 <div class="form-group">	
									<input type="text" class="form-control" name="surname" placeholder="Apellido" required>			
								 </div>
							 	<div class="form-group">		
								 	<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password" placeholder="Contraseña" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="password2" placeholder="Repita la Contraseña" required>
								</div>
								<!--<div class="form-group"> 
									<select name="tipo" id="tipo" required >
									    <option value="1">Alumno</option>
								        <option value="2">Docente</option>
									    <option value="3">Responsable</option>
									</select>
								</div>-->
								<button type="submit" class="btn btn-success btn-block">Registrarte</button>									
							</form>
							<?php if (isset($_GET['r'])==1){
												echo '<p><strong><span style="color: #ff0000;">El mail ingresado ya esta asociado a otra cuenta.</span></strong></p>';
											}elseif(isset($_GET['e'])==1){
												echo '<p><span style="color: #ff0000;"><strong>Las contraseñas no coinciden.</strong></span></p>';
											}elseif(isset($_GET['a'])==1){
												echo '<p><span style="color: #00ff00;"><strong>Cuenta Creada Correctamente</strong></span></p>';
											}
										?>
							<hr><p>¿Tienes una cuenta? <a href="../../index.php" title="Ingresar a una cuenta">Ingresar</a></p>
							<?php 
							include 'inc/footer.html';
							?>
						</div>
						

				</div>
			</div>
		</div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
 
	</body>
</html>