<?php

include 'inc/verificarAlumno.php';
require_once '../controllers/SeguimientosController.php';
require_once '../controllers/ReporteFinalController.php';
include 'inc/topScripts.php';
?>
<title>Mis Reportes</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">

            <div class="p-2 grey">
                <h2 class="pb-1 text-center" alt="reportes"> <b>Reportes</b> </h2>
                <hr>
                <h5 class="pb-1 text-center" alt="seguimientos"> <b>Seguimientos</b> </h5>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $seguimientos = new SeguimientosController();
                        $result = $seguimientos->getSeguimientos();
                        if (mysqli_num_rows($result) == 0) {
                            echo ("<p style='text-align: center;'>No hay Seguimientos enviados.<br /> </p>");
                        } else {
                        ?>
                        <div class="table-responsive pl-md-2 pr-md-2">

                            <table class="table table-dark table-hover table-bordered table-sm"
                                alt="tabla seguimientos">
                                <thead>
                                    <td class="text-center fit p-2" alt="numero"><b>Nro</b></td>
                                    <td class="p-2" alt="condicion"><b>Condición</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;" alt="fila ve informe">Ver
                                            Informe</b></td>
                                </thead>
                                <?php
                                    while ($fila = mysqli_fetch_array($result)) {
                                    ?>
                                <tr>
                                    <td class="align-middle"><?php echo ($fila['idSeguimientos']); ?></td>
                                    <td class="align-middle pl-2"><?php if ($fila['aprobadoSeg'] == 1) {
                                                                                echo ('<span style="color: #00ff00;">Aprobado</span>');
                                                                            } elseif ($fila['aprobadoSeg'] == 2) {
                                                                                echo ('<span style="color: #ff0000;">No Aprobado</span>');
                                                                            } else {
                                                                                echo ('No corregido');
                                                                            }
                                                                            ?></td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning">
                                            <strong><a
                                                    href='AlumnoViewSeguimiento.php?id=<?php echo $fila['idSeguimientos']; ?>'
                                                    style='color: black' alt="ir a seguimiento">Ver</a></strong>
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
                    </div>
                </div><!-- row 2 -->

                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pb-1 text-center" alt="informe final"> <b>Informe Final</b> </h5>
                        <?php
                        $rf = new ReporteFinalController();
                        $result = $rf->getReportes();
                        if (mysqli_num_rows($result) == 0) {
                            echo ("<p style='text-align: center;'>No hay Informes Finales Enviados.<br />");
                        } else {
                        ?>
                        <div class="table-responsive pl-md-2 pr-md-2">

                            <table class="table table-dark table-hover table-bordered table-sm ">
                                <thead>
                                    <td class="text-center fit p-2 " alt="nro informe final"><b>Nro</b></td>
                                    <td class="p-2" alt="condicion informe final"><b>Condción</b></td>
                                    <td class="text-center fit p-2" alt="columna ver informe final"><b>Ver
                                            Informe</b></td>
                                </thead>
                                <?php
                                    while ($fila = mysqli_fetch_array($result)) {
                                    ?>
                                <tr>
                                    <td class="align-middle"><?php echo ($fila['idFR']); ?></td>
                                    <td class="align-middle pl-2"><?php if ($fila['aprobadaFR'] == 1) {
                                                                                echo ('<span style="color: #00ff00;">Aprobado</span>');
                                                                            } elseif ($fila['aprobadaFR'] == 2) {
                                                                                echo ('<span style="color: #ff0000;">No Aprobado</span>');
                                                                            } else {
                                                                                echo ('No corregido');
                                                                            }
                                                                            ?></td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning ">
                                            <strong><a href='AlumnoViewFinalReport.php?id=<?php echo $fila['idFR']; ?>'
                                                    style='color: black' alt="ir a ver informe final">Ver</a></strong>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    // Liberar conjunto de resultados
                                    mysqli_free_result($result);
                                    // Cerrar la conexion;
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- row 3 -->
            <hr>
            <div class="row pt-2">
                <div class="col-lg-12">
                    <input type="button" class="btn btn-secondary btn-block" onclick="location.href='AlumnoHome.php';"
                        value="Volver" alt="volver" />
                </div>
            </div>


        </div>

    </div>
</div>
</div>

<?php
include 'inc/footerv2.html';
?>