<?php
include 'inc/verificarDocente.php';
require_once '../controllers/SeguimientosController.php';
require_once '../controllers/ReporteFinalController.php';
include 'inc/topScripts.php';
?>
<title>Ver Reportes</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">
            <div class="p-2 grey">
                <h2 class="pb-1 text-center" alt="seguimiento"> <b>Seguimientos</b> </h2>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $seguimientos = new SeguimientosController();
                        $result = $seguimientos->getSeguimientosDocenteAll();
                        if (mysqli_num_rows($result) == 0) {
                            echo ("<p style='text-align: center;'>No hay Seguimientos para corregir.<br />");
                        } else {
                        ?>
                        <div class="table-responsive pl-md-2 pr-md-2">

                            <table class="table table-dark table-hover table-bordered table-sm" alt="tabla">
                                <thead>
                                    <td class="text-center fit p-2" alt="numero"><b>Nro</b></td>
                                    <td class="p-2" alt="alumno"><b>Alumno</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;" alt="ver informe">Ver
                                            Informe</b></td>
                                </thead>
                                <?php
                                    while ($fila = mysqli_fetch_array($result)) {
                                    ?>
                                <tr>
                                    <td class="align-middle"><?php echo ($fila['idSeguimientos']); ?></td>
                                    <td class="align-middle pl-2">
                                        <?php echo ($fila['apellido'] . ', ' . $fila['nombre']) ?></td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning" alt="ir a seguimiento">
                                            <strong><a
                                                    href='DocenteViewSeguimiento.php?id=<?php echo $fila['idSeguimientos']; ?>&idP=<?php echo $fila['id_PPS']; ?>'
                                                    style='color: black'>Ver</a></strong>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    mysqli_free_result($result);
                                
                                ?>

                            </table>
                        </div><?php } ?>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h2 class="pb-1 text-center" alt="Informes Finales"> <b>Informes Finales</b> </h2>

                        <div class="row">

                            <div class="col-md-12">
                                <?php
                                    $rf = new ReporteFinalController();
                                    $result = $rf->getReportesDocente();
                                    if (!$result || mysqli_num_rows($result) == 0) {
                                        echo ("<p style='text-align: center;'>No hay Informes Finales para corregir.<br> </p>");
                                    } else {
                                    ?>
                                <div class="table-responsive pl-md-2 pr-md-2">

                                    <table class="table table-dark table-hover table-bordered table-sm">
                                        <thead>
                                            <td class="text-center fit p-2" alt="Nro"><b>Nro</b></td>
                                            <td class="p-2" alt="Alumno"><b>Alumno</b></td>
                                            <td class="text-center fit p-2" alt="Ver Informe"><b
                                                    style="max-width: 10%;">Ver Informe</b></td>
                                        </thead>
                                        <?php
                                        while ($fila = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td class="align-middle"><?php echo ($fila['idFR']); ?></td>
                                            <td class="align-middle pl-2">
                                                <?php echo ($fila['apellido'] . ', ' . $fila['nombre']) ?></td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-warning" alt="ir a informe">
                                                    <strong><a
                                                            href='DocenteEvaluateFinalReport.php?id=<?php echo $fila['idFR']; ?>&idP=<?php echo $fila['idPPS_FP']; ?>'
                                                            style='color: black'>Ver</a></strong>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                }
                // Liberar conjunto de resultados
                mysqli_free_result($result);
            
            ?>
                                    </table>

                                </div><?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-2">
                            <div class="col-lg-12">
                                <input type="button" class="btn btn-secondary btn-block"
                                    onclick="location.href='DocenteHome.php';" value="Volver" />

                            </div>
                        </div>
                    </div>

                </div>



            </div>


        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>