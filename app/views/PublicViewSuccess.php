<?php

session_start();
include 'inc/topScripts.php';
?>
<title>FAQs</title>
</head>
<?php
include 'inc/headerv2.php';
?>

<div class="container col-md-12  ">
    <div class="row align-items-center ">
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto py-4">
            <div class="p-4 grey ">
                <div class="row py-4">
                    <div class="col-lg-12" alt="mensaje">
                        <h3>Los cambios se han guardado correctamente ! :)</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="button" class="btn btn-secondary btn-block" onclick="location.href='ResponsableViewPPS.php';" value="Volver" alt="volver"/>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>