<?php 
    include 'inc/verificarDocente.php';    
    require_once '../controllers/SeguimientosController.php';    
    require_once '../controllers/ReporteFinalController.php';
?>	
<!doctype html>
<html lang="es">
  <head>
    <title>Informes</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"">
    <link rel="stylesheet" href="css/home.css">
    
  </head>

  <body>
		<div class="container">
			<div class="cardtable" style="max-width: 700px">
				<div class="row">
				<?php 
                    include 'inc/header.php';
				?>					
                </div><!-- row 1 --><hr>
                
				<div class="row">
					<div class="col-md-12">	
							<h2>Seguimientos</h2>		<br>				
                            <?php
                                $seguimientos=new SeguimientosController();
                                $result=$seguimientos->getSeguimientosDocente();
                                if(mysqli_num_rows($result) == 0) {
                                    echo("<p style='text-align: center;'>No hay Seguimientos para corregir.<br />");
                                    }
                                    else{
                            ?>
                            <table class="table ">
                                <tr class="bg-primary">
                                    <td><b>Nro</b></td>
                                    <td><b>Alumno</b></td>
                                    <td><b>Ver Informe</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                    <td><?php echo ($fila['idSeguimientos']); ?></td>
                                    <td><?php echo($fila['apellido'].', '.$fila['nombre']) ?></td>
                                    <td>
                                        <button class="btn btn-warning" >
                                        <strong>Ver</strong>
                                         </button>
                                    </td>
                                </tr>                               
                                        <?php
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($result);}
                                        ?>
                                   
                            </table>                           
                    </div>
                </div><!-- row 2 --> <hr>

                <div class="row">
					<div class="col-md-12">	
                        <h2>Informes Finales</h2>		<br>				
                            <?php                                                                                     
                                 $rf=new ReporteFinalController();
                                 $result=$rf->getReportesDocente();
                                if(mysqli_num_rows($result) == 0) {
                                    echo("<p style='text-align: center;'>No hay Informes Finales para corregir.<br />");
                                    }
                                    else{                                                                           
                            ?> 
                            
                            <table class="table">
                                <tr class="bg-primary">
                                    <td><b>Nro</b></td>
                                    <td><b>Alumno</b></td>
                                    <td><b>Ver Documento</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($result))
                                {
                            ?>
                                <tr>
                                <td><?php echo ($fila['idFR']); ?></td>
                                    <td><?php echo ($fila['apellido'].', '.$fila['nombre']); ?> </td>
                                    <td>
                                        <button class="btn btn-warning" >
                                        <strong>Ver</strong>
                                         </button>
                                    </td>
                                </tr>                               
                                        <?php
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($result);
                                    }
                                        ?>
                                   
                            </table>                           
                    </div>
                </div><!-- row 3 -->

                <div class="row">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='HomeDocente.php';" value="Volver" />
                    </div>
                </div><!-- row 4 -->
                <?php 
							include 'inc/footer.html';
						?>
			</div><!-- card -->
        </div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
	</body>
</html>	