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
                    header('location: AlumnoHome.php');
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Informe Final de PPS Nº <?php echo $reporte['idFR']; ?></h2>
                        <hr>
                    </div>
                </div>
                <h5>Conclusiones sobre la experiencia de la PPS</h5>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <textarea class="form-control " name="conclusiones" placeholder="Mensaje" readonly style="min-height: 175px;"><?php echo $reporte['conclusiones']; ?></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="Volver">
                            <input type="button" class="btn btn-secondary btn-block" onclick="location.href='AlumnoMyReports.php';" value="Volver" />
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