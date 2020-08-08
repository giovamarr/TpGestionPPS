<?php
    include 'inc/verificarDocente.php';
    require_once '../controllers/RequestController.php';    
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Estados de mis PPS</title>
	
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
							<h2>PPSs</h2>		<br>				
                            <?php
                                $Cant_por_Pag = 5;
                                $pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
                                if (!$pagina) {
                                    $inicio = 0;
                                    $pagina=1;
                                    }
                                else {
                                    $inicio = ($pagina - 1) * $Cant_por_Pag;
                                    }// total de páginas
                                
                                $soli=new RequestController();
                                $total_paginas=$soli->TotaldePPSParaDocente($Cant_por_Pag);
                                $vResultado=$soli->getPPSPaginadoParaDocente($inicio,$Cant_por_Pag);
                                if(mysqli_num_rows($vResultado) == 0) {
                                    echo("<p style='text-align: center;'>No hay PPS Pendientes.<br />");
                                    }
                                    else{

                            ?>
                            <table class="table">
                                <tr class="bg-primary">
                                <td><b>Nro de PPS</b></td>
                                    <td><b>Apellido</b></td>
                                    <td><b>Nombre</b></td>
                                    
                                    <td><b>Tipo de PPS</b></td>
                                    <td><b>Entidad</b></td>
                                    <td><b>Estado</b></td>
                                </tr>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado))
                                {
                            ?>
                                <tr>
                                <td><?php echo ($fila['idPPS']); ?></td>
                                    <td><?php echo ($fila['apellido']); ?></td>
                                    <td><?php echo ($fila['nombre']); ?></td>
                                    
                                    <td><?php echo ($fila['caractPPS']); ?></td>
                                    <td><?php echo ($fila['nombreEntidad']); ?></td>           
                                    <td>  
                                        <?php 
                                            if($fila['PPSTerminada']==1){
                                                echo('<span style="color: #00ff00;"><strong>Aprobado</strong></span>');
                                            }elseif($fila['PPSTerminada']==2){
                                                echo('<strong><span style="color: #ff0000;">No Aprobado</span></strong>');
                                            }else{echo('<strong>En Curso</strong>');} 
                                        ?>
                                    </td>
                                    </td>
                                </tr>                               
                                        <?php
                                        
                                        }
                                        // Liberar conjunto de resultados
                                        mysqli_free_result($vResultado);
                                        ?>
                                   
                            </table>
                            <p style='text-align: center;'>
                            <?php
                            if ($total_paginas > 1){
                                for ($i=1;$i<=$total_paginas;$i++){
                                    if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo $pagina . " ";
                                    else
                                    //si la página no es la actual, coloco el enlace para ir a esa página
                                    echo "<a href='viewMyPPSDocente.php?pagina=" . $i ."'>" . $i . "</a> ";}}}?>
                                    <p>&nbsp;</p>                        
                    </div>
                </div><!-- row 2 --> <hr>
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