<?php
include 'inc/verificarAlumno.php';
require_once '../controllers/RequestController.php';
include 'inc/topScripts.php';
?>
<title>Solicitud PPS</title>
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
                        if ($result != 0) {
                            ?>
            <div class='p-4 grey'>
                <h2 class='pb-1 text-center' alt='solicitud inicial de pps'> <b>Solicitud Inicial de PPS</b> </h2>
                <hr>
                <p style='text-align: center;'>Ya tienes una PPS en curso.<br /> </p>
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
                        ?>
            <form class="p-4 grey" method="POST" action="../controllers/requestController.php?m=insertarPPS">
                <h2 class="pb-1 text-center" alt="solicitud inicial de pps"> <b>Solicitud Inicial de PPS</b> </h2>
                <hr>
                <h5 class="text-center pb-2" alt="seccion datos">Datos de la Entidad / Organización / Institución</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="caractPPS" alt="Característica PPS"
                                placeholder="Característica PPS" minlength="5" maxlength="60"
                                pattern="[A-Za-z0-9_-\s]{1,60}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombreEntidad" alt="Nombre de la Entidad"
                                placeholder="Nombre de la Entidad" minlength="5" maxlength="60"
                                pattern="[A-Za-z0-9_-\s]{1,60}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="direccion" alt="direccion"
                                placeholder="Dirección" minlength="5" maxlength="50" pattern="[A-Za-z0-9_-\s]{1,50}"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cp" alt="correo postal"
                                placeholder="Correo Postal" minlength="4" maxlength="32" pattern="[A-Za-z0-9_-\s]{1,32}"
                                required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="localidad" alt="localidad"
                                placeholder="Localidad" minlength="4" maxlength="50" pattern="[A-Za-z0-9_-\s]{1,50}"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="telefono" alt="telefono"
                                placeholder="Teléfono" minlength="7" maxlength="32" pattern="[0-9]{1,32}" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp"
                                alt="email" placeholder="Mail del contacto" minlength="5" maxlength="40" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="contacto" alt="persona de contacto"
                                placeholder="Persona de contacto de la Entidad" minlength="4" maxlength="50"
                                pattern="[A-Za-z0-9_-\s]{1,50}" required>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <?php if (isset($_GET['e']) == 1) {
                        echo '<div class="alert alert-danger mt-2 p-2 text-left" role="alert">
                        <b>Usted ha enviado una solicitud de PPS, por favor espere que se le asigne un profesor.</b>
                      </div>';
                    } elseif (isset($_GET['a']) == 1) {
                        echo '<div class="alert alert-success mt-2 p-2 text-left" style="background-color: #80cd92;" role="alert">
                        <b>Solicitud enviada correctamente</b>
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
                      }
                        ?>
        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>