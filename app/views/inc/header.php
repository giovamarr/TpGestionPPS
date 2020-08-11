<div class="col-lg-12"><br>
	<h2 class="rounded" onclick="location.href='HomeAlumno.php';" ><strong>Sistema de Gestion de PPS</strong></h2>
</div> 
<div class="col-lg-6"><br>
	<h3><?php echo $_SESSION['name'].' '.$_SESSION['ape']?></h3>
</div>
<div class="col-lg-6">
	<form class="cerrar" action="../../app/controllers/logout.php" method="post" ><br>
		<button type="submit" class="btn btn-danger btn-block ce">
	        <span class="glyphicon glyphicon-log-out"></span>&nbsp Cerrar Sesión
	    </button>	
	</form>								
</div>	