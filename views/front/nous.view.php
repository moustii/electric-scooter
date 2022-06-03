<?php 
ob_start();
$title = "Nous...";
$description = "Page adresse et contact";
?>

<div class="card mb-3">
    <h3 class="card-header">Nous trouver</h3>
    <img class="img-fluid persoMapsSize mx-auto" src="public/sources/images/autres/maps.png" alt="maps">
    <div class="card-body">
        <p class="card-text text-center">
            Ci dessus une carte qui indique l'endroit où nous sommes <br>
            Trouvez-nous et bénéficier de -20% pour la premiere fois <br>
            N'hésitez pas à demander votre chemin autour de vous 😉
        </p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Vous êtes à la CPAM de créteil</li>
        <li class="list-group-item">Continuez sur Rue des Baudrieux</li>
        <li class="list-group-item">Au bout de la rue Nous sommes sur votre droite</li>
    </ul>
</div>

<div class="card mb-3">
    <h3 class="card-header">Nous contacter</h3>
    <div class="row no-gutter text-center">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <h5 class="p-3">Email <i class="bi bi-envelope"></i></h5>
            <p>trotman-custom@gmail.com</p>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <h5 class="p-3">Téléphone <i class="bi bi-telephone"></i></h5>
            <p>06 06 06 06 06</p>
        </div>
    </div>
</div>





<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>