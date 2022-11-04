<?php
session_start();
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 1) {
        header('location:app/views/AlumnoHome.php');
    } elseif ($_SESSION['type'] == 2) {
        header('location:app/views/DocenteHome.php');
    } elseif ($_SESSION['type'] == 3) {
        header('location:app/views/ResponsableHome.php');
    } else {
    }
}
include 'app/views/inc/topScripts.php';
?>
<link rel=" shortcut icon" type="image/png" href="./app/views/inc/utnlogo.png" />
<title>Inicio</title>
<link rel=" stylesheet" href="./app/views/css/page.css">
</head>
<div class="container">
    <nav
        class="navbar navbar-expand-lg navbar-light d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3 mb-4 pt-4">

        <div class="d-flex text-start ">
            <a class="navbar-brand text-start d-flex " href="index.php">
                <div>
                    <span><img src="app/views/inc/logo.png" width="130" height="70" alt="UTN">
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
                <li><a href="./index.php" class="nav-link px-2  text-primary">Home</a></li>
                <li><a href="./app/views/PublicFAQs.php" class="nav-link px-2  text-primary">FAQs</a></li>
                <li><a href="./app/views/PublicContact.php" class="nav-link px-2  text-primary">Contacto</a></li>
            </ul>
            <div class="col-md-4 text-end">
                <button type="button" class="btn btn-outline-primary w-45" onclick="window.location.href='index.php'">
                    Iniciar Sesión
                </button>
                <button type="button" class="btn btn-primary w-45"
                    onclick="window.location.href='./app/views/PublicRegister.php'">Registrarse</button>
            </div>

        </div>
    </nav>
    <hr>
    <div class="row">
        <div class="container col-xl-10 col-xxl-8 px-3 py-5">
            <div class="row align-items-center g-lg-5 ">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-5 fw-bold lh-1 mb-3" alt="Sistema de Gestión de PPS">
                        Bienvenido al Sistema de Gestión de PPS
                    </h1>
                    <p class="col-lg-12 fs-4 " alt="mensaje">
                        En este sitio web podras completar las Prácticas Profesionales Supervisadas correspondientes a
                        la carrera de Ingenieria en Sitemas de la Informacion de la Universidad UTN - FRRO.
                    </p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 grey" action="app/controllers/UsuarioController.php?i=1"
                        method="post">
                        <div class="form-floating mb-3">
                            <input type="text" alt="correo" class="form-control input-lg" name="email"
                                placeholder="Email" required />
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" alt="contraseña" class="form-control input-lg" name="password"
                                placeholder="Contraseña" required />
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit" alt="iniciar sesion">
                            Ingresar
                        </button>
                        <div class="text-center">
                            <?php if (isset($_GET['e']) == 1) {
                                echo '<br><medium class="text" style="color:#ed4956;">Usuario o Contrase&ntilde;a Incorrecta</medium>';
                            }
                            ?>
                        </div>
                        <hr class="" />
                        <medium class="text-muted">
                            <p class="mb-0">¿No tienes Cuenta? <a href="./app/views/PublicRegister.php"
                                    title="Crear cuenta" alt="ir a registrarse">Registrate</a>
                        </medium>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php
    include 'app/views/inc/footerv2.html';
    ?>