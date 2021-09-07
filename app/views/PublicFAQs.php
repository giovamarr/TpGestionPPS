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
        <div class="col d-block align-items-center justify-content-center col-md-8 mx-auto">
            <div class="p-4 grey ">
                <h1 class="text-center"> <b>FAQs</b> </h1>
                <hr>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left preguntas" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ¿Que es una PPS?(faltan contestar)
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed preguntas" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Otra preg
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                Some placeholder content for the second accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed preguntas" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Otra preg
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include 'inc/footerv2.html';
?>