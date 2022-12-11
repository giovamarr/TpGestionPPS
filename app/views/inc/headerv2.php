<div class="container">
    <nav
        class="navbar navbar-expand-lg navbar-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3 mb-4 pt-4">

        <div class="d-flex text-start ">
            <a class="navbar-brand text-start d-flex " href="../../index.php">
                <div>
                    <span><img src="../views/inc/logo.png" width="130" height="70" alt="UTN">
                    </span>

                </div>
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  m-auto text-primary">
                <li><a href="../../index.php" class="nav-link px-2  text-primary">Inicio</a></li>
                <li><a href="../views/PublicFAQs.php" class="nav-link px-2  text-primary">Preguntas Frecuentes</a></li>
                <li><a href="../views/PublicContact.php" class="nav-link px-2  text-primary">Contacto</a></li>
            </ul>
            <?php

            if (isset($_SESSION['type'])) {
                include 'inc/dropdownUser.php';
            } else {
                include 'inc/buttons.php';
            }
            ?>

        </div>

    </nav>
    <hr>