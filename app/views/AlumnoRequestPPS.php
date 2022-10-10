<?php
include 'inc/verificarAlumno.php';
include 'inc/topScripts.php';
?>
<title>Solicitud PPS</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="arrow" viewBox="0 0 16 16">
        <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
        </path>
    </symbol>
</svg>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">

            <form class="p-4 grey" method="post" action="../controllers/requestController.php?m=insertarPPS">
                <h2 class="pb-1 text-center" alt="solicitud inicial de pps"> <b>Solicitud Inicial de PPS</b> </h2>
                <hr>
                <h5 class="text-center pb-2" alt="seccion datos">Datos de la Entidad / Organización / Institución</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="caractPPS" alt="Característica PPS" placeholder="Característica PPS" minlength="1" maxlength="60" pattern="[A-Za-z0-9_-\s]{1,60}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nombreEntidad" alt="Nombre de la Entidad" placeholder="Nombre de la Entidad" minlength="1" maxlength="60" pattern="[A-Za-z0-9_-\s]{1,60}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="direccion" alt="direccion" placeholder="Dirección" minlength="1" maxlength="50" pattern="[A-Za-z0-9_-\s]{1,50}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cp" alt="correo postal" placeholder="Correo Postal" minlength="1" maxlength="32" pattern="[A-Za-z0-9_-\s]{1,32}" required>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="localidad" alt="localidad" placeholder="Localidad" minlength="1" maxlength="50" pattern="[A-Za-z0-9_-\s]{1,50}" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telefono" alt="telefono" placeholder="Teléfono" minlength="1" maxlength="32" pattern="[0-9]{1,32}" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" alt="email" placeholder="Mail del contacto" minlength="1" maxlength="40" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="contacto" alt="persona de contacto" placeholder="Persona de contacto de la Entidad" minlength="1" maxlength="50" pattern="[A-Za-z0-9_-\s]{1,50}" required>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <?php if (isset($_GET['e']) == 1) {
                        echo '<p><span style="color: #ff0000;">Usted ya tiene una solicitud PPS en curso</span></p>';
                    } elseif (isset($_GET['a']) == 1) {
                        echo '<p><span style="color: #00ff00;">Solicitud enviada correctamente</span></p>';
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-6 m-1 mx-auto">
                        <form action="mainAlumno.php">
                            <input type="button" class="btn btn-secondary btn-block" onclick="location.href='AlumnoHome.php';" value="Cancelar"alt="cancelar" />
                        </form>
                    </div>
                    <div class="col-md-6  m-1 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block" alt="enviar"> Enviar</button>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>