<?php
include 'inc/verificarDocente.php';
include 'inc/topScripts.php';
?>
<title>Menu</title>
</head>

<body>
    <?php
    include 'inc/headerv2.php';
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="arrow" viewBox="0 0 16 16">
            <path d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z">
            </path>
        </symbol>
    </svg>

    <div class="container px-4 py-4" id="hanging-icons">
        <h1 class="pb-2 text-center" alt="menu">Menú</h1>
        <div class="row g-4 py-4 row-cols-1 row-cols-lg-3 d-flex justify-content-center">

            <div class="card col-md m-2 menu">
                <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;">
                    <h3 class="card-title text-center" alt="Corregir Informes">Corregir Informes</h3>
                    <p class="card-text">
                        En esta seccion se puede aprobar o desaprobar seguimiento e informes finales.
                    </p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary " onclick="location.href='DocenteViewReport.php';" alt="ir a Corregir Informes">
                            <svg width="20" height="20" fill="currentColor" class="bi bi-arrow-right-circle-fill d-flex align-items-center justify-content-center">
                                <use xlink:href="#arrow"></use>
                            </svg>
                        </button>

                    </div>
                </div>
            </div>
            <div class="card col-md m-2 menu">
                <div class="card-body" style="justify-content: space-between;flex-direction: column; display: flex;">
                    <h3 class="card-title text-center" alt="ver pps">Ver PPS</h3>
                    <p class="card-text">
                    En esta seccion se puede ver los estados de las PPS de sus alumnos.       
                    </p>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary " onclick="location.href='DocenteViewMyPPS.php';" alt="ir a ver pps">
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