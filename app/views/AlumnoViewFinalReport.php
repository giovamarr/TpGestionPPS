<?php
include 'inc/verificarAlumno.php';
require_once '../controllers/ReporteFinalController.php';
include 'inc/topScripts.php';
?>
<title>Seguimiento PPS</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">

            <div class="p-3 grey">
                <?php if (isset($_GET['id'])) {
                    $fr = new ReporteFinalController();
                    $reporte = $fr->getReporte($_GET['id']);
                } else {
                    header('Location: AlumnoHome.php');
                    exit();
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 alt="Informe Final de PPS">Informe Final de PPS Nº <?php echo $reporte['idFR']; ?></h2>
                        <hr>
                    </div>
                </div>
                <h5 alt="Conclusiones sobre la experiencia de la PPS">Conclusiones sobre la experiencia de la PPS</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea alt="conclusion" class="form-control " name="conclusiones" placeholder="Mensaje"
                                readonly style="min-height: 175px;"><?php echo $reporte['conclusiones']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <p alt="comentario del profesor"><strong>Comentario del Profesor</strong><input type="text"
                                    class="form-control" name="comentario" value="<?php echo $reporte['comentario']; ?>"
                                    readonly> </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="Volver">
                            <input type="button" class="btn btn-secondary btn-block"
                                onclick="location.href='AlumnoMyReports.php';" value="Volver" alt="volver" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>