<?php
session_start();
include 'inc/topScripts.php';
?>
<title>Contacto</title>
</head>
<?php
include 'inc/headerv2.php';
?>
<div class="container  col-md-12 ">
    <div class="row align-items-center">
        <div class="col-md-10 mx-auto col-lg-6">
            <form class="p-4  grey" action="../controllers/UsuarioController.php?m=insertarUser" method="post">

                <h2>Contactanos</h2>
                <hr />
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Nombre Completo" required minlength="4" maxlength="50" pattern="[A-Za-z0-9_-\s]{4,50}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" required minlength="4" maxlength="40">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="asunto" placeholder="Asunto" required minlength="1" maxlength="100" pattern="[A-Za-z0-9_-\s]{1,100}">
                </div>
                <div class="form-group">
                    <textarea class="form-control " name="msg" placeholder="Mensaje" required style="min-height: 175px;" minlength="1" maxlength="500" pattern="[A-Za-z0-9_-\s]{1,500}"></textarea>
                </div>
                <button type="submit" class="w-100 h-1 btn btn-lg btn-primary">Enviar</button>
                <div class="text-center">

                    <?php if (isset($_GET['r']) == 1) {
                        echo '<br><medium class="text" style="color:#ed4956;">El mail ingresado ya esta asociado a otra cuenta.</medium>';
                    } elseif (isset($_GET['e']) == 1) {
                        echo '<br><medium class="text" style="color:#ed4956;">Las contraseñas no coinciden.</medium>';
                    } elseif (isset($_GET['a']) == 1) {
                        echo '<br><medium class="text" style="color:#00ff00;">Cuenta Creada Correctamente</medium>';
                    }
                    ?>
                </div>
            </form>


            </form>

        </div>
    </div>
</div>
<?php
include 'inc/footerv2.html';
?>