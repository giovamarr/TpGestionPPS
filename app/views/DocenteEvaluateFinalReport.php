<?php
include 'inc/verificarDocente.php';
require_once '../controllers/ReporteFinalController.php';
include 'inc/topScripts.php';
?>
<title>Ver Reporte</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">
            <div class="p-2 grey">
                <?php if (isset($_GET['id']) and isset($_GET['idP'])) {
                    $fr = new ReporteFinalController();
                    $reporte = $fr->getReporteDocente($_GET['id'], $_GET['idP']);
                } else {
                    header('Location: AlumnoHome.php');
                    exit();
                }
                ?>
                <h2 class="p-1 text-center" alt="Informe Final de PPS"> <b>Informe Final de PPS Nº
                        <?php echo $reporte['idFR']; ?></b> </h2>
                <hr>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group p-2">
                            <h5 alt="Conclusiones sobre la experiencia de la PPS">Conclusiones sobre la experiencia de
                                la PPS</h5>
                            <textarea class="form-control " name="conclusiones" alt="Conclusiones" readonly
                                style="min-height: 175px;"><?php echo $reporte['conclusiones']; ?></textarea>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <form action="../controllers/ReporteFinalController.php?m=aprobarRF" method="POST">
                                    <input type="hidden" name="idPPS" value="<?php echo $reporte['idPPS_FP']; ?>">
                                    <input type="hidden" name="idFR" value="<?php echo $reporte['idFR']; ?>">
                                    <button type="submit" class="btn btn-success btn-block"
                                        alt="aprobar conclusion">Aprobar</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <form action=".php" method="POST">
                                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                        data-target="#desaprobarModal" alt="desaprobar conclusion">Desaprobar</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <form action="Volver">
                                    <input type="button" class="btn btn-secondary btn-block"
                                        onclick="location.href='DocenteViewReport.php';" value="Volver" alt="volver" />
                                </form>
                            </div>
                        </div>

                        <!----------------------Modal para agregar comentario cuando se desaprueba-------------------->

                        <div class="modal" id="desaprobarModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel" alt="Agregue un comentario">
                                            Agregue un comentario</h5>
                                    </div>
                                    <form method="POST"
                                        action="../controllers/ReporteFinalController.php?m=desaprobarRF">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label"
                                                    alt="comentario">Comentario</label>
                                                <textarea class=" form-control" name="comentario"
                                                    alt="area para comentario" minlength="1" maxlength="300"
                                                    pattern="[A-Za-z0-9_-\s]{1,300}"></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-secondary btn-block"
                                                data-dismiss='modal' value="Cancelar" alt="cancelar" />
                                            <input type="hidden" name="idPPS"
                                                value="<?php echo $reporte['idPPS_FP']; ?>">
                                            <input type="hidden" name="idFR" value="<?php echo $reporte['idFR']; ?>">
                                            <button type="submit" class="btn btn-primary" alt="Enviar Comentario">Enviar
                                                Comentario</button>
                                        </div>
                                    </form>

                                </div>
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