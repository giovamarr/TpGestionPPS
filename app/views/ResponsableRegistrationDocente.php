<?php

include 'inc/verificarResponsable.php';
require_once '../controllers/UsuarioController.php';
include 'inc/topScripts.php';
?>
<title>Registro</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<div class="row">
    <div class="container  col-md-12">
        <div class="row align-items-center">
            <div class="col d-block align-items-center justify-content-center col-md-11 mx-auto">
                <div class="p-4 p-md-5 border rounded-3 grey">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 alt="Registrar Docente">Docentes Registrados</h2>
                        <button class="btn btn-success" type="button" onclick="changeclass();">Nuevo Docente</button>
                    </div>
                    <div class="d-none mt-1" id="newDocente"
                        style="background: #c7c7c7;padding: 20px;border-radius: 5px;">
                        <form action="../controllers/UsuarioController.php?m=insertarUser" method="POST">

                            <div class="form-group">
                                <input type="text" alt="nombre" class="form-control" name="name" placeholder="Nombre"
                                    minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" alt="apellido" class="form-control" name="surname"
                                    placeholder="Apellido" minlength="4" maxlength="20" pattern="[A-Za-z0-9_-\s]{1,20}"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="email" alt="email" class="form-control" name="email"
                                    aria-describedby="emailHelp" minlength="4" maxlength="32"
                                    placeholder="Correo Electrónico" required>
                            </div>
                            <div class="form-group">
                                <input type="password" alt="contraseña" class="form-control" name="password"
                                    placeholder="Contraseña" minlength="6" maxlength="20"
                                    pattern="[A-Za-z0-9_-\s]{1,20}" required>
                            </div>
                            <div class="form-group">
                                <input type="password" alt="repetir contraseña" class="form-control" name="password2"
                                    placeholder="Repita la Contraseña" minlength="6" maxlength="20"
                                    pattern="[A-Za-z0-9_-\s]{1,20}" required>
                            </div>
                            <div class="form-group">
                                <input type="number" alt="tipo" id="tipo" class="form-control" name="tipo" value=2
                                    hidden required>
                            </div>
                            <button type="submit" class="w-100 h-1 btn btn-primary" alt="confirmar registro">Registrar
                                Docente</button>
                            <div class="text-center">
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
                                    <b>Docente registrado correctamente</b>
                                </div>';
                                }
                                ?>
                            </div>

                        </form>
                    </div>
                    <hr />
                    <div>
                        <div class="pl-2 pr-2 pt-4">
                            <?php
                            $controller = new UsuarioController();
                            $vResultado = $controller->getInfoProfesores();
                            if (mysqli_num_rows($vResultado) == 0) {
                                echo ("<p style='text-align: center;'>No hay docentes registrados.<br />");
                            } else {

                            ?>
                            <div class="table-responsive pl-md-2 pr-md-2">
                                <table class="table table-dark table-hover table-bordered table-sm" alt="table">
                                    <thead>
                                        <td class="text-center fit p-2"><b style="max-width: 10%;"
                                                alt="Nombre">Nombre</b></td>
                                        <td class="text-center fit p-2"><b style="max-width: 10%;"
                                                alt="Apellido">Apellido</b></td>

                                        <td class="text-center fit p-2"><b style="max-width: 10%;"
                                                alt="Correo">Correo</b></td>
                                        <td class="text-center fit p-2"><b style="max-width: 10%;" alt="Entidad">PPSs
                                                Asignadas</b></td>
                                    </thead>
                                    <?php
                                while ($fila = mysqli_fetch_array($vResultado)) {
                                    $userController = new UsuarioController();
                                    $profesores = $userController->getProfesores();
                                ?>
                                    <tr>
                                        <td class="align-middle"><?php echo ($fila['nombre']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['apellido']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['email']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['PPSs']); ?></td>

                                    </tr>

                                    <?php

                                }
                                // Liberar conjunto de resultados
                                mysqli_free_result($profesores);
                                mysqli_free_result($vResultado);
                            }
                                ?>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div>
                        <hr>
                        <div class="row pt-1">
                            <div class="col-lg-12">
                                <input type="button" class="btn btn-secondary btn-block"
                                    onclick="location.href='ResponsableHome.php';" value="Volver" alt="volver" />
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
function changeclass() {
    var NAME = document.getElementById("newDocente")
    NAME.classList.toggle('d-none');
}
</script>
<?php
include 'inc/footerv2.html';
?>