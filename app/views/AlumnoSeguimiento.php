<?php
include 'inc/verificarAlumno.php';
require_once '../controllers/RequestController.php';
include 'inc/topScripts.php';
?>
<title>Seguimiento PPS</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="arrow" viewBox="0 0 16 16">
        <path
            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
        </path>
    </symbol>
</svg>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">
            <?php
            $soli = new RequestController();
            $result = $soli->getSolicitud();
            if ($result == 0) {
                ?>
            <div class='p-4 grey'>
                <h2 class="pb-1 text-center" alt="Formulario de Seguimiento de PPS"> <b>Formulario de Seguimiento de
                        PPS</b> </h2>
                <hr>
                <p style='text-align: center;'>No tienes una PPS en curso, envía una solicitud inicial,o en caso de
                    haber
                    enviado la solicitud inicial, espera que se te asigne un profesor.<br /> </p>
                <hr>
                <div class="col-md-6 m-1 mx-auto">
                    <form action="mainAlumno.php">
                        <input type="button" class="btn btn-secondary btn-block"
                            onclick="location.href='AlumnoHome.php';" value="Volver" alt="Volver" />
                    </form>
                </div>
            </div>
            <?php
                        } else {
                            $result = $soli->chequearHoras();                       
                            if($result){                        
                            ?>
            <div class='p-4 grey'>
                <h2 class="pb-1 text-center" alt="Formulario de Informe Final"> <b>Formulario de Seguimiento de
                        PPS</b> </h2>
                <hr>
                <p style='text-align: center;'>Ya has completado las 200 horas necesarias para enviar el Informe
                    Final.<br /> </p>
                <hr>
                <div class="col-md-6 m-1 mx-auto">
                    <form action="mainAlumno.php">
                        <input type="button" class="btn btn-secondary btn-block"
                            onclick="location.href='AlumnoHome.php';" value="Volver" alt="Volver" />
                    </form>
                </div>
            </div>
            <?php
                            } else{
                            ?>
            <form class="p-4 grey" method="POST" action="../controllers/SeguimientosController.php?m=insertarSeguim">
                <h2 class="pb-1 text-center" alt="Formulario de Seguimiento de PPS"> <b>Formulario de Seguimiento de
                        PPS</b> </h2>
                <hr>
                <h5 class="text-center pb-2" alt="Comentarios">Comentarios / Observaciones</h5>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="actividadesRealizadas"
                                alt="Actividades Realizadas" placeholder="Actividades Realizadas" minlength="5"
                                maxlength="100" pattern="[A-Za-z0-9_-\s]{1,100}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="actividadesProximas"
                                alt="Proximas Actividades" placeholder="Proximas Actividades" minlength="5"
                                maxlength="100" pattern="[A-Za-z0-9_-\s]{1,100}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cuestionesPendientes"
                                alt="Cuestines Pendientes" placeholder="Cuestines Pendientes" minlength="5"
                                maxlength="100" pattern="[A-Za-z0-9_-\s]{1,100}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="experiencias"
                                alt="Experiencias, Compliciones y Obstáculos"
                                placeholder="Experiencias, Compliciones y Obstáculos" minlength="5" maxlength="100"
                                pattern="[A-Za-z0-9_-\s]{1,100}" required>
                        </div>

                    </div><!-- col 1 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="desvioCronograma" alt="Desvios de Cronograma"
                                placeholder="Desvios de Cronograma" minlength="5" maxlength="100"
                                pattern="[A-Za-z0-9_-\s]{1,100}" required>
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" class="form-control" name="hsTrabajadas" alt="Horas Trabajadas"
                                placeholder="Horas Trabajadas" minlength="1" maxlength="20" required>
                        </div>
                        <div class="form-group">
                            <input type="number" min="0" class="form-control" name="TotalhsTrabajadas"
                                alt="Total de horas Trabajadas" placeholder="Total de horas Trabajadas" minlength="1"
                                maxlength="20" required>
                        </div>
                    </div><!-- col 2 -->
                </div><!-- row 3 -->

                <div class="row d-flex justify-content-center">
                    <?php if (isset($_GET['e']) == 1) {
                            echo '<div class="alert alert-danger mt-2 p-2 text-left" role="alert">
                            <b>No tiene una PPS en curso o todavia no se le ha asignado un Profesor.</b>
                          </div>';
                        } elseif (isset($_GET['a']) == 1) {
                            echo '
                            <div class="alert alert-success mt-2 p-2 text-left" style="background-color: #80cd92;" role="alert">
                            <b>Seguimiento enviado correctamente</b>
                          </div>
                         ';
                        } elseif (isset($_GET['s']) == 1) {
                            echo '<div class="alert alert-danger mt-2 p-2 text-left" role="alert">
                            <b>Usted Tiene un Informe final con la correccion pendiente</b>
                          </div>';
                        }
                        ?>
                </div>
                <div class="row">
                    <div class="col-md-6 m-1 mx-auto">
                        <form action="mainAlumno.php">
                            <input type="button" class="btn btn-secondary btn-block"
                                onclick="location.href='AlumnoHome.php';" value="Cancelar" alt="cancelar" />
                        </form>
                    </div>
                    <div class="col-md-6  m-1 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block" alt="enviar"> Enviar</button>
                    </div>
                </div>


            </form>
            <?php 
                            } }                         ?>
        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>