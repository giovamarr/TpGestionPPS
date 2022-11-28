<?php
include 'inc/verificarDocente.php';
require_once '../controllers/RequestController.php';
include 'inc/topScripts.php';
?>
<title>Ver PPS</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">
            <div class="p-2 grey">
                <h2 class="p-2 text-center" alt="PPSs"> <b>PPSs</b> </h2>

                <hr>
                <div class="pl-2 pr-2 pt-4">
                    <?php
                    $Cant_por_Pag = 5;
                    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
                    if (!$pagina) {
                        $inicio = 0;
                        $pagina = 1;
                    } else {
                        $inicio = ($pagina - 1) * $Cant_por_Pag;
                    } // total de páginas

                    $soli = new RequestController();
                    $total_paginas = $soli->TotaldePPSParaDocente($Cant_por_Pag);
                    $vResultado = $soli->getPPSPaginadoParaDocente($inicio, $Cant_por_Pag);
                    if (mysqli_num_rows($vResultado) == 0) {
                        echo ("<p style='text-align: center;'>No hay PPS Pendientes.<br />");
                    } else {

                    ?>
                        <div class="table-responsive pl-md-2 pr-md-2">

                            <table class="table table-dark table-hover table-bordered table-sm">
                                <thead>
                                    <td class="text-center fit p-2" alt="Nro de PPS"><b style="max-width: 10%;">Nro de PPS</b></td>
                                    <td class="text-center fit p-2" alt="Apellido"><b style="max-width: 10%;">Apellido</b></td>
                                    <td class="text-center fit p-2" alt="Nombre"><b style="max-width: 10%;">Nombre</b></td>
                                    <td class="text-center  fit p-2" alt="Tipo de PPS"><b style="max-width: 10%;">Tipo de PPS</b></td>
                                    <td class="text-center  p-2" alt="Entidad"><b style="max-width: 10%;">Entidad</b></td>
                                    <td class="text-center  p-2" alt="Estado"><b style="max-width: 10%;">Estado</b></td>
                                    <td class="text-center fit p-2" alt="Ver"><b style="max-width: 10%;"></b></td>
                                </thead>
                                <?php
                                while ($fila = mysqli_fetch_array($vResultado)) {
                                ?>
                                    <tr>
                                        <td class="align-middle"><?php echo ($fila['idPPS']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['apellido']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['nombre']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['caractPPS']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['nombreEntidad']); ?></td>
                                        <td class="align-middle"> <?php
                                                                    if ($fila['PPSTerminada'] == 1) {
                                                                        echo ('<span style="color: #00ff00;"><strong>Aprobado</strong></span>');
                                                                    } elseif ($fila['PPSTerminada'] == 2) {
                                                                        echo ('<strong><span style="color: #ff0000;">No Aprobado</span></strong>');
                                                                    } else {
                                                                        echo ('<strong>En Curso</strong>');
                                                                    }
                                                                    ?>
                                                                    </td>
                                        <td class="text-center align-middle">
                                                <button class="btn btn-warning" alt="ir a informe">
                                                    <strong><a
                                                            href='DocenteViewDetailPPS.php'
                                                            style='color: black'>Ver</a></strong>
                                                </button>
                                            </td>
                                                                </tr>
                                                                <?php
                                }
                                mysqli_free_result($vResultado);
                                
                                ?>

</table>

                        </div>
                        <span style='text-align: center;'>
                        <?php
                        if ($total_paginas > 1) {
                            for ($i = 1; $i <= $total_paginas; $i++) {
                                if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo $pagina . " ";
                                else
                                    //si la página no es la actual, coloco el enlace para ir a esa página
                                    echo "<a href='viewMyPPSDocente.php?pagina=" . $i . "'>" . $i . "</a> ";
                            }
                        }
                    } ?>
                        &nbsp;
                    </span>
                </div>
                <hr>
                <div class="row pt-1">
                    <div class="col-lg-12" >
                        <input type="button"alt="volver" class="btn btn-secondary btn-block" onclick="location.href='DocenteHome.php';" value="Volver" />
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>