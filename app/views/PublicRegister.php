<?php
session_start();
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 1) {
        header('location:AlumnoHome.php');
    } elseif ($_SESSION['type'] == 2) {
        header('location:DocenteHome.php');
    } elseif ($_SESSION['type'] == 3) {
        header('location:ResponsableHome.php');
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
                <form class="p-4 p-md-5 border rounded-3 grey" action="../controllers/UsuarioController.php?m=insertarUser" method="post">

                    <h2 alt="Crea tu cuenta">Crea tu cuenta</h2>
                    <hr />
                    <div class="form-group">
                        <input type="text" alt="nombre" class="form-control" name="name" placeholder="Nombre" minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" alt="apellido" class="form-control" name="surname" placeholder="Apellido" minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" alt="email" class="form-control" name="email" aria-describedby="emailHelp" minlength="4" maxlength="32" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="password" alt="contraseña" class="form-control" name="password" placeholder="Contraseña" minlength="6" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="password" alt="confirmar contraseña" class="form-control" name="password2" placeholder="Repita la Contraseña" minlength="6" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                    </div>
                    <div class="form-group">
                        <input type="number" alt="tipo" id="tipo" class="form-control" name="tipo" value=1 disabled hidden required>
                    </div>
                    <button type="submit" class="w-100 h-1 btn btn-lg btn-primary" alt="confirmar registro">Registrarte</button>
                    <div class="text-center"alt="mensaje">

                        <?php if (isset($_GET['r']) == 1) {
                            echo '<br><medium class="text" style="color:#ed4956;">El mail ingresado ya esta asociado a otra cuenta.</medium>';
                        } elseif (isset($_GET['e']) == 1) {
                            echo '<br><medium class="text" style="color:#ed4956;">Las contraseñas no coinciden.</medium>';
                        } elseif (isset($_GET['a']) == 1) {
                            echo '<br><medium class="text" style="color:#00ff00;">Cuenta Creada Correctamente</medium>';
                        }
                        ?>
                    </div>
                    <hr class="" />
                    <medium class="text-muted">
                        <p class="mb-0" alt="Tienes una cuenta">¿Tienes una cuenta? <a href="../../index.php" title="Ingresar a una cuenta" alt="ir al inicio de sesion">Ingresar</a>
                    </medium>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footerv2.html';
?>