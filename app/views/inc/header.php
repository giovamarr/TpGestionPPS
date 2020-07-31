<div class="col-lg-6"><br>
	<h3><?php echo $_SESSION['name']?></h3>
</div>
<div class="col-lg-6">
	<form class="cerrar" action="../../app/controllers/logout.php" method="post" ><br>
		<button type="submit" class="btn btn-danger btn-block ce">
	        <span class="glyphicon glyphicon-log-out"></span>&nbsp Cerrar Sesión
	    </button>	
	</form>								
</div>	