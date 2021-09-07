<?php
include 'inc/verificarDocente.php';
require_once '../controllers/SeguimientosController.php';
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
                    $se = new SeguimientosController();
                    $seguimiento = $se->getSeguiDocente($_GET['id'], $_GET['idP']);
                } else {
                    header('location: AlumnoHome.php');
                }
                ?>
                <h2 class="pb-1 text-center"> <b>Seguimiento de PPS Nº <?php echo $seguimiento['idSeguimientos']; ?></b> </h2>
                <hr>
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-lg-12">
                            <form method="post" action="">
                                <div class="form-group">
                                    <p><strong>Actividades Realizadas</strong> <input type="text" class="form-control" name="actividadesRealizadas" value="<?php echo $seguimiento['actividadesRealizadas']; ?>" readonly></p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Actividades Proximas</strong> <input type="text" class="form-control" name="actividadesProximas" value="<?php echo $seguimiento['actividadesProximas']; ?>" readonly> </p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Cuestiones Pendientes</strong><input type="text" class="form-control" name="cuestionesPendientes" value="<?php echo $seguimiento['cuestionesPendientes']; ?>" readonly> </p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Experiencias, Compliciones y Obstáculos</strong><input type="text" class="form-control" name="experiencias" value="<?php echo $seguimiento['experiencias']; ?>" readonly> </p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Desvio del Cronograma</strong> <input type="text" class="form-control" name="desvioCronograma" value="<?php echo $seguimiento['desvioCronograma']; ?>" readonly> </p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Horas Trabajadas</strong><input type="number" min="0" class="form-control" name="hsTrabajadas" value="<?php echo $seguimiento['hsTrabajadas']; ?>" readonly> </p>
                                </div>
                                <div class="form-group">
                                    <p><strong>Total de Horas Trabajadas</strong><input type="number" min="0" class="form-control" name="TotalhsTrabajadas" value="<?php echo $seguimiento['TotalhsTrabajadas']; ?>" readonly></p>
                                </div>

                            </form>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <form action="../controllers/SeguimientosController.php?m=aprobarSegui" method="post">
                                    <input type="hidden" name="idPPS" value="<?php echo $seguimiento['id_PPS']; ?>">
                                    <input type="hidden" name="idSeguimientos" value="<?php echo $seguimiento['idSeguimientos']; ?>">
                                    <button type="submit" class="btn btn-success btn-block">Aprobar</button>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#desaprobarModal">Desaprobar</button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <form action="Volver">
                                    <input type="button" class="btn btn-secondary btn-block" onclick="location.href='DocenteViewReport.php';" value="Volver" />
                                </form>
                            </div>
                        </div>

                        <!----------------------Modal para agregar comentario cuando se desaprueba-------------------->

                        <div class="modal" id="desaprobarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregue un comentario</h5>
                                    </div>
                                    <form method="post" action="../controllers/SeguimientosController.php?m=desaprobarSegui">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Comentario</label>
                                                <textarea class="form-control" name="comentario" minlength="1" maxlength="300" pattern="[A-Za-z0-9_-\s]{1,300}"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-secondary btn-block" data-dismiss='modal' value="Cancelar" />
                                            <input type="hidden" name="idPPS" value="<?php echo $seguimiento['id_PPS']; ?>">
                                            <input type="hidden" name="idSeguimientos" value="<?php echo $seguimiento['idSeguimientos']; ?>">
                                            <button type="submit" class="btn btn-primary">Enviar Comentario</button>
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