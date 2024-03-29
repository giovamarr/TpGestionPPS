<?php
include 'inc/verificarResponsable.php';
require_once '../controllers/RequestController.php';
require_once '../controllers/UsuarioController.php';
include 'inc/topScripts.php';
?>
<title>PPSs Aprobadas</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-11 mx-auto">
            <div class="p-2 grey">
                <h2 class="p-2 text-center" alt="PPS a evaluar"> <b>PPS a evaluar</b> </h2>

                <hr>
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
                    $total_paginas = $soli->totalPagsPPSAprobadas($Cant_por_Pag);
                    $vResultado = $soli->getPPSAprobadasPaginado($inicio, $Cant_por_Pag);
                    if (mysqli_num_rows($vResultado) == 0) {
                        echo ("<p style='text-align: center;'>No hay PPS Pendientes.<br />");
                    } else {
                    ?>
                    <div class="table-responsive pl-md-2 pr-md-2">
                        <table class="table table-dark table-hover table-bordered table-sm">
                            <thead>
                                <td class="text-center fit p-2" alt="Alumno"><b style="max-width: 10%;">Alumno</b></td>
                                <td class="text-center fit p-2" alt="Profesor"><b style="max-width: 10%;">Profesor</b>
                                </td>
                                <td class="text-center fit p-2" alt="Nro de PPS"><b style="max-width: 10%;">Nro de
                                        PPS</b></td>
                                <td class="text-center fit p-2" alt="Tipo de PPS"><b style="max-width: 10%;">Tipo de
                                        PPS</b></td>
                                <td class="text-center fit p-2" alt="Entidad"><b style="max-width: 10%;">Entidad</b>
                                </td>
                                <td class="text-center fit p-2" alt="Direccion"><b style="max-width: 10%;">Direccion</b>
                                </td>
                                <td class="text-center fit p-2" alt="Contacto"><b style="max-width: 10%;">Contacto</b>
                                </td>
                                <td class="text-center fit p-2" alt="Aprobar"><b style="max-width: 10%;">Segui...</b>
                                </td>
                                <td class="text-center fit p-2" alt="Aprobar"><b style="max-width: 10%;">Aprobar</b>
                                </td>
                                <td class="text-center fit p-2" alt="Desaprobar"><b
                                        style="max-width: 10%;">Desaprobar</b></td>
                            </thead>
                            <?php
                                while ($fila = mysqli_fetch_array($vResultado)) {
                                ?>
                            <tr>

                                <td class="align-middle"><?php echo ($fila['apellido'] . ', ' . $fila['nombre']); ?>
                                </td>
                                <td class="align-middle"><?php echo ($fila['apellidoP'] . ', ' . $fila['nombreP']); ?>
                                </td>
                                <td class="align-middle"><?php echo ($fila['idPPS']); ?></td>
                                <td class="align-middle"><?php echo ($fila['caractPPS']); ?></td>
                                <td class="align-middle"><?php echo ($fila['nombreEntidad']); ?></td>
                                <td class="align-middle"><?php echo ($fila['direccion'] . ", " . $fila['localidad']); ?>
                                </td>
                                <td class="align-middle"><?php echo ($fila['emailE']); ?></td>
                                <td class="align-middle"><a
                                        href="ResponsableRegisterAprovedPPSViewSegumientos.php?idPps=<?php echo $fila['idPPS']; ?> &iduser=<?php echo $fila['IdUser']; ?> &idprof=<?php echo $fila['IdProf']; ?>"
                                        class="nav-link px-4  text-primary">Ver</a></td>
                                <td class="align-middle">
                                    <form action="../controllers/RequestController.php?m=evaluarPPS" method="POST">
                                        <input type="hidden" name="idPPS" value="<?php echo $fila['idPPS']; ?>">
                                        <input type="hidden" name="valor" value=1>
                                        <button type="submit" class="btn btn-success btn-block"
                                            alt="aprobar boton">Aprobar</button>
                                    </form>
                                </td>
                                <td class="align-middle">

                                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                        data-target=<?php echo "#desaprobarModal".$fila['idPPS']; ?>
                                        alt="desaprobar conclusion">Desaprobar</button>

                                </td>
                                <div class="modal" id=<?php echo "desaprobarModal".$fila['idPPS']; ?> tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"
                                                    alt="Agregue un comentario">
                                                    Agregue un comentario</h5>
                                            </div>
                                            <form action="../controllers/RequestController.php?m=evaluarPPS"
                                                method="POST">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label"
                                                            alt="comentario">Comentario</label>
                                                        <textarea class=" form-control" name="comentario"
                                                            alt="area para comentario" minlength="1" maxlength="300"
                                                            pattern="[A-Za-z0-9_-\s]{1,300}"></textarea>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-secondary btn-block"
                                                        data-dismiss='modal' value="Cancelar" alt="cancelar" />
                                                    <input type="hidden" name="idPPS"
                                                        value="<?php echo $fila['idPPS']; ?>">
                                                    <input type="hidden" name="valor" value=2>
                                                    <button type="submit" class="btn btn-primary"
                                                        alt="Enviar Comentario">Enviar
                                                        Comentario</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php
                                }
                                // Liberar conjunto de resultados
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
                                    echo "<a href='viewRegistrarAprobadoPPS.php?pagina=" . $i . "'>" . $i . "</a> ";
                            }
                        }
                    } ?>
                        &nbsp;</span>
                </div>
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

<?php
include 'inc/footerv2.html';
?>