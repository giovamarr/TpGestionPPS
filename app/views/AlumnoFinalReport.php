<?php
include 'inc/verificarAlumno.php';
include 'inc/topScripts.php';
?>
<title>Reporte Final</title>
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

            <form class="p-4 grey" method="post" action="../controllers/ReporteFinalController.php?m=insertarReporte">
                <h2 class="pb-1 text-center"> <b>Formulario de Informe Final de PPS</b> </h2>
                <hr>
                <h5 class="text-center pb-2">Conclusiones sobre la experiencia de la PPS</h5>
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="form-group">
                            <textarea class="form-control " name="conclusiones" placeholder="Escribe aquí su Conclusión" required style="min-height: 175px;" minlength="1" maxlength="750" pattern="[A-Za-z0-9_-\s]{1,750}"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <?php if (isset($_GET['e']) == 1) {
                        echo '<p><span style="color: #ff0000;">No tiene una PPS en curso o todavia no se le ha asignado un Profesor.</span></p>';
                    } elseif (isset($_GET['r']) == 1) {
                        echo '<p><span style="color: #ff0000;">Usted ya ha enviado un Informe Final.</span></p>';
                    } elseif (isset($_GET['a']) == 1) {
                        echo '<p><span style="color: #00ff00;">Informe Final enviado correctamente</span></p>';
                    } elseif (isset($_GET['d']) == 1) {
                        echo '<p><span style="color: #ff0000;">No se puedo enviar el informe, intente de nuevo mas tarde.</span></p>';
                    } elseif (isset($_GET['s']) == 1) {
                        echo '<p><span style="color: #ff0000;">Espere que sus seguimientos sean calificados.</span></p>';
                    }
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-6 m-1 mx-auto">
                        <form action="mainAlumno.php">
                            <input type="button" class="btn btn-secondary btn-block" onclick="location.href='AlumnoHome.php';" value="Cancelar" />
                        </form>
                    </div>
                    <div class="col-md-6  m-1 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block"> Enviar</button>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>