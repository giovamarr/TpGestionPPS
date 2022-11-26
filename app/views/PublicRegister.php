<?php
session_start();
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 1) {
        header('Location: AlumnoHome.php');
        exit();
    } elseif ($_SESSION['type'] == 2) {
        header('Location: DocenteHome.php');
        exit();
    } elseif ($_SESSION['type'] == 3) {
        header('Location: ResponsableHome.php');
        exit();
    } else {
    }
}
include 'inc/topScripts.php';
?>
<title>Registro</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<div class="row">
    <div class="container  col-md-12 px-2 py-2">
        <div class="row align-items-center g-md-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 grey"
                    action="../controllers/UsuarioController.php?m=insertarUser" method="POST">

                    <h2 alt="Crea tu cuenta">Crea tu cuenta</h2>
                    <hr />
                    <div class="form-group">
                        <input type="text" alt="nombre" class="form-control" name="name" placeholder="Nombre"
                            minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" alt="apellido" class="form-control" name="surname" placeholder="Apellido"
                            minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" alt="email" class="form-control" name="email" aria-describedby="emailHelp"
                            minlength="4" maxlength="32" placeholder="Correo Electrónico" required>
                    </div>
                    <div class="form-group">
                        <input type="password" alt="contraseña" class="form-control" name="password"
                            placeholder="Contraseña" minlength="6" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="password" alt="confirmar contraseña" class="form-control" name="password2"
                            placeholder="Repita la Contraseña" minlength="6" maxlength="20"
                            pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="number" alt="tipo" id="tipo" class="form-control" name="tipo" value=1 hidden
                            required>
                    </div>
                    <button type="submit" class="w-100 h-1 btn btn-lg btn-primary"
                        alt="confirmar registro">Registrarte</button>
                    <div class="text-center" alt="mensaje">

                        <?php if (isset($_GET['r']) == 1) {
                            echo '<div class="alert alert-danger mt-2 p-2 text-left" role="alert">
                            <b>El mail ingresado ya esta asociado a otra cuenta.</b>
                          </div>';
                        } elseif (isset($_GET['e']) == 1) {
                            echo '<div class="alert alert-danger mt-2 p-2 text-left" role="alert">
                            <b>Las contraseñas no coinciden.</b>
                          </div>';
                        } elseif (isset($_GET['a']) == 1) {
                            echo '<div class="alert alert-success mt-2 p-2 text-left" style="background-color: #80cd92;" role="alert">
                            <b>Cuenta Creada Correctamente</b>
                          </div>';
                        }
                        ?>
                    </div>
                    <hr class="" />
                    <medium class="text-muted">
                        <p class="mb-0" alt="Tienes una cuenta">¿Tienes una cuenta? <a href="../../index.php"
                                title="Ingresar a una cuenta" alt="ir al inicio de sesion">Ingresar</a>
                    </medium>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footerv2.html';
?>