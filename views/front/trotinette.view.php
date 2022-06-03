<?php 
ob_start();
$title = $trotinette->getLabel();
$description = "Page descriptive d'une trotinette";
?>

<div class="card mb-3 mx-auto" style="max-width: 940px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="public/sources/images/trotinettes/<?=$trotinette->getUrlImage()?>" class="img-fluid rounded-start" alt="<?=$trotinette->getLabelImage()?>">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?=$trotinette->getLabel()?></h5>
                <p class="card-text">
                    <?=$trotinette->getDescriptionTrotinette()?>
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Couleur : <?=$trotinette->getColor()?></li>
                    <li class="list-group-item">Vitesse max : <?=$trotinette->getSpeed()?> km/h</li>
                    <li class="list-group-item">Autonomie <?=$trotinette->getBatteryLife()?> km</li>
                    <li class="list-group-item">
                        Prix : <?=$trotinette->getPrice()?> €
                        <div class="text-end">
                            <span class="badge rounded-pill <?=($trotinette->getIdStatus()==1)? 'bg-success':'bg-danger'?>">
                                <?=($trotinette->getIdStatus()==1)? 'dispo':'indispo'?>
                            </span>
                        </div>
                    </li>    
                </ul>
            </div>
        </div>
    </div>
</div>




<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>