<?php
include 'inc/verificarAlumno.php';

require_once '../controllers/SeguimientosController.php';
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
                    $se = new SeguimientosController();
                    $seguimiento = $se->getOne($_GET['id']);
                } else {
                    header('location: AlumnoHome.php');
                }
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 alt="Seguimiento de PPS">Seguimiento de PPS Nº <?php echo $seguimiento['idSeguimientos']; ?></h2>
                        <hr>
                    </div>
                </div><!-- row 2 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p  ><strong>Actividades Realizadas</strong> <input type="text"alt="actividades realizadas" class="form-control" name="actividadesRealizadas" value="<?php echo $seguimiento['actividadesRealizadas']; ?>" readonly></p>
                        </div>
                        <div class="form-group">
                            <p><strong>Actividades Proximas</strong> <input type="text" alt="actividades Proximas" class="form-control" name="actividadesProximas" value="<?php echo $seguimiento['actividadesProximas']; ?>" readonly> </p>
                        </div>
                        <div class="form-group">
                            <p><strong>Cuestiones Pendientes</strong><input type="text"alt="Cuestiones Pendientes" class="form-control" name="cuestionesPendientes" value="<?php echo $seguimiento['cuestionesPendientes']; ?>" readonly> </p>
                        </div>
                        <div class="form-group">
                            <p><strong>Experiencias, Compliciones y Obstáculos</strong><input alt="Experiencias, Compliciones y Obstáculos" type="text" class="form-control" name="experiencias" value="<?php echo $seguimiento['experiencias']; ?>" readonly> </p>
                        </div>
                        <div class="form-group">
                            <p><strong>Desvio del Cronograma</strong> <input type="text" alt="Desvio del Cronograma" class="form-control" name="desvioCronograma" value="<?php echo $seguimiento['desvioCronograma']; ?>" readonly> </p>
                        </div>
                        <div class="form-group">
                            <p><strong>Horas Trabajadas</strong><input type="number" alt="Horas Trabajadas" min="0" class="form-control" name="hsTrabajadas" value="<?php echo $seguimiento['hsTrabajadas']; ?>" readonly> </p>
                        </div>
                        <div class="form-group">
                            <p><strong>Total de Horas Trabajadas</strong><input type="number" alt="Total de Horas Trabajadas" min="0" class="form-control" name="TotalhsTrabajadas" value="<?php echo $seguimiento['TotalhsTrabajadas']; ?>" readonly></p>
                        </div>
                        <div class="form-group">
                            <p><strong>Comentario del Profesor</strong><input type="text" alt="Comentario del Profesor" class="form-control" name="comentario" value="<?php echo $seguimiento['comentario']; ?>" readonly> </p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="mainAlumno.php">
                            <input type="button" class="btn btn-secondary btn-block" onclick="location.href='AlumnoMyReports.php';" value="Volver" alt="volver"/>
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