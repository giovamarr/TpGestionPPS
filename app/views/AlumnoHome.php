<?php
include 'inc/verificarAlumno.php';
include 'inc/topScripts.php';
?>
<title>Menu</title>
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

<div class="container px-4 py-2" id="menu">
    <h1 class="pb-2 text-center" alt="menu">Menú</h1>
    <div class="row g-4 py-4 row-cols-1 row-cols-lg-3 d-flex justify-content-center">

        <div class="card col-md m-2 menu">
            <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;" alt="Solicitud de Inicio de PPS">
                <h3 class="card-title text-center">Solicitud de Inicio de PPS</h3>
                <p class="card-text">En esta seccion se puede completar y enviar una solicitud de inicio  de PPS, la cual completará con los datos solicitados.</p>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary " onclick="location.href='AlumnoRequestPPS.php';" alt="ir a Solicitud de Inicio">
                        <svg width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle-fill d-flex align-items-center justify-content-center">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </button>

                </div>
            </div>
        </div>
        <div class="card col-md m-2 menu">
            <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;">
                <h3 class="card-title text-center" alt="Seguimiento de PPS">Seguimiento de PPS</h3>
                <p class="card-text">En esta seccion se puede completar y enviar un seguimiento de PPS.</p>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary " onclick="location.href='AlumnoSeguimiento.php';" alt="ir a Seguimiento de PPS">
                        <svg width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle-fill d-flex align-items-center justify-content-center">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </button>

                </div>
            </div>
        </div>

        <div class="card col-md m-2 menu">
            <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;">
                <h3 class="card-title text-center" alt="Infome Final PPS">Infome Final PPS</h3>
                <p class="card-text">En esta seccion se puede completar y enviar un Informe Final.</p>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary " onclick="location.href='AlumnoFinalReport.php';" alt="ir a Infome Final">
                        <svg width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle-fill d-flex align-items-center justify-content-center">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </button>

                </div>
            </div>
        </div>
        <div class="card col-md m-2 menu">
            <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;">
                <h3 class="card-title text-center" alt="Estado de Mis PPS">Estado de Mis PPS</h3>
                <p class="card-text">En esta seccion se puede ver el estado de los informes enviados.</p>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary " onclick="location.href='AlumnoMyReports.php';" alt="ir a Estado de Mis PPS">
                        <svg width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle-fill d-flex align-items-center justify-content-center">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>