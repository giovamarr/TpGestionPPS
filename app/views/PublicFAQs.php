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
                <h1 class="text-center" alt="faqs"> <b>FAQs</b> </h1>
                <hr>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left preguntas" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" alt="pregunta">
                                    ¿Que es una PPS?
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body" alt="respuesta">
                            Se entiende por Práctica Profesional Supervisada (PPS) a las actividades estudiantiles desarrolladas en ámbitos laborales. Son complementarias a la formación académica y pueden realizarse tanto en organismos públicos como en empresas privadas.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed preguntas" alt="pregunta" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ¿Para que sirven las PPS?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" alt="respuesta">
                            Las Prácticas Profesionales Supervisadas (PPS) tienen como propósito brindar al estudiante una experiencia práctica, complementaria a su formación, favoreciendo su inserción en el ejercicio profesional.

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