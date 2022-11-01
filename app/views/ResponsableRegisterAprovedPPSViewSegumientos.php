<?php
include 'inc/verificarResponsable.php';
require_once '../controllers/SeguimientosController.php';
require_once '../controllers/UsuarioController.php';
require_once '../controllers/ReporteFinalController.php';
include 'inc/topScripts.php';
?>
<title>PPS a Evaluar</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-11 mx-auto">
            <div class="p-2 grey">
                <h2 class="p-2 text-center" alt="Seguimientos"> <b>Resumen PPS</b> </h2>
                <?php if (isset($_GET['idPps']) and isset($_GET['iduser']) and isset($_GET['idprof'])) {
                    $seguimientosController = new SeguimientosController;
                    $vResultado = $seguimientosController->getSeguimientosAdmin($_GET['idPps']);
                    
                    $usuarioController = new UsuarioController;
                    $vUserResult = $usuarioController->getById($_GET['iduser']);
                    $userResult = mysqli_fetch_array($vUserResult);
                    $vProfResult = $usuarioController->getById($_GET['idprof']);
                    $profResult = mysqli_fetch_array($vProfResult);

                    $reporteFinalController = new ReporteFinalController;
                    $vReporteFinal = $reporteFinalController->getReporteFinalAdmin($_GET['idPps']);
                
                } else {
                    header('location: ResponsableRegisterAprovedPPS.php');
                }

                if (mysqli_num_rows($vResultado) == 0) {
                    echo ("<p style='text-align: center;'>No hay Seguimientos para esta PPS.<br />");
                } else { 
                
                ?>
                <div class="row py-3">
                    <div class="col-md-6">
                    <h3><b>Alumno:</b>  <?php echo ($userResult['apellido'] . ', ' . $userResult['nombre']); ?></h3>
                    </div>
                    <div class="col-md-6">
                    <h3><b>Profesor:</b>  <?php echo ($profResult['apellido'] . ', ' . $profResult['nombre']); ?></h3>
                    </div>
                </div>

                <div class="table-responsive-lg pl-md-2 pr-md-2">
                    <h4 class="text-center">Seguimientos</h4>
                        <table class="table table-dark table-hover table-bordered table-sm">
                            <thead>
                                <td class="text-center fit p-2" alt="Actividades Realizadas"><b style="max-width: 10%;">Act. Realizadas</b></td>
                                <td class="text-center fit p-2" alt="Actividades Proximas"><b style="max-width: 10%;">Act. Proximas</b></td>
                                <td class="text-center fit p-2" alt="Cuestiones Pendientes"><b style="max-width: 10%;">Pendientes</b></td>
                                <td class="text-center fit p-2" alt="Experiencias"><b style="max-width: 10%;">Experiencias</b></td>
                                <td class="text-center fit p-2" alt="Horas Trabajadas"><b style="max-width: 10%;">Hs Trabajadas</b></td>
                                <td class="text-center fit p-2" alt="Desvio Cronograma"><b style="max-width: 10%;">Desvio Cronograma</b></td>
                                <td class="text-center fit p-2" alt="Total hs"><b style="max-width: 10%;">Total hs</b></td>
                                <td class="text-center fit p-2" alt="Resultado"><b style="max-width: 10%;">Resultado</b></td>
                            </thead>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado)) {
                                ?>
                            <tr>
                                <td class="align-middle"><?php echo ($fila['actividadesRealizadas']); ?>
                                <td class="align-middle"><?php echo ($fila['actividadesProximas']); ?>
                                <td class="align-middle"><?php echo ($fila['cuestionesPendientes']); ?>
                                <td class="align-middle"><?php echo ($fila['experiencias']); ?>
                                <td class="align-middle"><?php echo ($fila['hsTrabajadas']); ?>
                                <td class="align-middle"><?php echo ($fila['desvioCronograma']); ?>
                                <td class="align-middle"><?php echo ($fila['TotalhsTrabajadas']); ?>
                                <td class="align-middle"><?php if ($vReporteFinal['aprobadaFR'] == 1) {
                                                                                echo ('<span>Aprobado</span>');
                                                                            } elseif ($vReporteFinal['aprobadaFR'] == 2) {
                                                                                echo ('<span">No Aprobado</span>');
                                                                            } else {
                                                                                echo ('No corregido');
                                                                            }
                                                                            ?>
                            </tr>
                            <?php
                            }    
                            }
                                // Liberar conjunto de resultados
                                mysqli_free_result($vResultado);
                            ?>
                        </table>
                <!-- Informe Final -->
                <div class="row py-1">
                    <div class="col-lg-12">
                        <h4 class="text-center">Reporte final</h4>
                    </div>
                    <div class="col-lg-6">
                        <h5><b>Conclusion</b>  <?php echo ($vReporteFinal['conclusiones']); ?></h5> 
                    </div>
                    <div class="col-lg-6">
                        <h5 class="text-right"><b>Resultado Final</b>  <?php if ($vReporteFinal['aprobadaFR'] == 1) {
                                                                                echo ('<span>Aprobado</span>');
                                                                            } elseif ($vReporteFinal['aprobadaFR'] == 2) {
                                                                                echo ('<span">No Aprobado</span>');
                                                                            } else {
                                                                                echo ('No corregido');
                                                                            }
                                                                            ?></td></h5> 
                    </div>
                </div>
                <!-- Botones aprobar / desaprobar -->
                
                <div class="row pt-1">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block"
                            onclick="location.href='ResponsableRegisterAprovedPPS.php';" value="Volver" alt="volver" />
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>