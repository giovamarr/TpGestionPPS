<?php
include 'inc/verificarResponsable.php';
require_once '../controllers/RequestController.php';
require_once '../controllers/UsuarioController.php';
include 'inc/topScripts.php';
?>
<title>Tutores de PPS</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-11 mx-auto">
            <div class="p-2 grey">
                <h2 class="p-2 text-center" alt="Definir Tutores de PPS"> <b>Definir Tutores de PPS</b> </h2>

                <hr>
                <?php
                    $month = date('m');
                    $year = date('Y');
                ?>
                <form>
                    <select name="" value="<?php echo ($month); ?>" id="">
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    
                    <select name="" id="">
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <button></button>
                </form>
                <div class="pl-2 pr-2 pt-4">
                    <?php
                    $Cant_por_Pag = 5;
                    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
                    if (!$pagina) {
                        $inicio = 0;
                        $pagina = 1;
                    } else {
                        $inicio = ($pagina - 1) * $Cant_por_Pag;
                    } // total de páginas

                    $soli = new RequestController();
                    $total_paginas = $soli->totalPags($Cant_por_Pag);

                    $vResultado = $soli->getPPSAprobadasFechaPaginado($inicio, $month, $year, $Cant_por_Pag);
                    if (mysqli_num_rows($vResultado) == 0) {
                        echo ("<p style='text-align: center;'>No hay PPS Aprobadas.<br />");
                    } else {

                    ?>

                        <div class="table-responsive-lg pl-md-2 pr-md-2">
                            <table class="table table-dark table-hover table-bordered table-sm" alt="table">
                                <thead>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Apellido">Apellido</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Nombre">Nombre</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Nro de PPS">Nro de PPS</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Tipo de PPS">Tipo de PPS</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Entidad">Entidad</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Direccion">Direccion</b></td>
                                    <td class="text-center fit p-2"><b style="max-width: 10%;"alt="Contacto">Contacto</b></td>
                                </thead>
                                <?php
                                while ($fila = mysqli_fetch_array($vResultado)) {
                                    $userController = new UsuarioController();
                                    $profesores = $userController->getProfesores();
                                ?>
                                    <tr>
                                        <td class="align-middle"><?php echo ($fila['apellido']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['nombre']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['idPPS']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['caractPPS']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['nombreEntidad']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['direccion'] . ", " . $fila['localidad']); ?></td>
                                        <td class="align-middle"><?php echo ($fila['emailE']); ?></td>
                                        <!-- <td class="align-middle">
                                            <form action="../controllers/RequestController.php?m=elegirProfesor" method="post">
                                                <select class="form-control" id="idProfe" name="idProfe" required>

                                                    <?php while ($prof = mysqli_fetch_array($profesores)) {
                                                        echo "<option value=" . $prof['id'] . ">" . $prof['nombre'] . " " . $prof['apellido'] . "</option>";
                                                    ?>
                                                    <?php } ?>
                                                </select>
                                        </td>
                                        <td class="align-middle">
                                            <input type="hidden" name="idPPS" value="<?php echo $fila['idPPS']; ?>">
                                            <button type="submit" class="btn btn-success btn-block" value="Select" alt="aceptar">Aceptar</button>
                                            </form>
                                        </td> -->
                                    </tr>

                                <?php

                                }
                                // Liberar conjunto de resultados
                                mysqli_free_result($profesores);
                                mysqli_free_result($vResultado);
                                ?>

                            </table>

                        </div><span style='text-align: center;'>
                        <?php
                        if ($total_paginas > 1) {
                            for ($i = 1; $i <= $total_paginas; $i++) {
                                if ($pagina == $i)
                                    //si muestro el índice de la página actual, no coloco enlace
                                    echo $pagina . " ";
                                else
                                    //si la página no es la actual, coloco el enlace para ir a esa página
                                    echo "<a href='viewPPSResponsable.php?pagina=" . $i . "'>" . $i . "</a> ";
                            }
                        }
                    } ?>
                        &nbsp;</span>
                </div>
                <hr>
                <div class="row pt-1">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='ResponsableHome.php';" value="Volver" alt="volver" />
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>