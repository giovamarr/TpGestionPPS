<!doctype html>
<html lang="es">
  <head>
    <title>Inicio de Sesion</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
	<link rel="stylesheet" href="app/views/css/login.css">
  </head>

  <body>
		<div class="container-fluid">			
			<div class="row">
				<div class="col-md-12">		
					<div class="card">
						<div class="loginBox">
							<h2>Iniciar Sesion</h2><hr />	

							<form action="app/controllers/UsuarioController.php?i=1" method="post">                           	
								<div class="form-group">									
									<input type="text" class="form-control input-lg" name="email" placeholder="Email" required>        
								</div>							
								<div class="form-group">        
									<input type="password" class="form-control input-lg" name="password" placeholder="Contraseña" required>       
								</div>								    
									<button type="submit" class="btn btn-success btn-block glyphicon glyphicon-chevron-right" >Ingresar</button>
							</form>
							<?php if (isset($_GET['e'])==1){
								echo '<p><strong><span style="color: #ff0000;">Usuario o Contrase&ntilde;a Incorrecta</span></strong></p>';
							}
							?>													
							<!--<hr><p>¿No tienes Cuenta? <a href="app/views/register.php" title="Crear cuenta">Registrate</a></p>		-->							
						</div><!-- /.loginBox -->	
						<?php 
							include 'app/views/inc/footer.html';
						?>
					</div><!-- /.card -->
				</div><!-- /.col -->
			</div><!--/.row-->
		</div><!-- /.container -->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	