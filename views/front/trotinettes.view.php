<?php 
ob_start();
$title = "Nos trotinettes";
$description = "La page listant les trotinettes";
?>

<div class="row no-gutters">
    <?php foreach($trotinettes as $key => $trotinette):?>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card mb-3">
            <h3 class="card-header text-center"><?=$trotinette->getLabel()?></h3>
            <!-- <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
            </div> -->
            <img class="img-fluid persoImg mx-auto my-2" src="public/sources/images/trotinettes/<?=$trotinette->getUrlImage()?>" alt="<?=$trotinette->getLabelImage()?>">
            <div class="card-body">
                <p class="card-text">
                    <?=$trotinette->getDescriptionTrotinette()?>
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Couleur : <?=$trotinette->getColor()?></li>
                <li class="list-group-item">Vitesse max : <?=$trotinette->getSpeed()?> km/h</li>
                <li class="list-group-item">Autonomie <?=$trotinette->getBatteryLife()?> km</li>
                <li class="list-group-item">
                    Prix : <?=$trotinette->getPrice()?> €
                    <div class="text-end">
                        <span class="badge rounded-pill <?=($trotinette->getIdStatus()? 'bg-success':'bg-danger')?>">
                            <?=($trotinette->getIdStatus()? 'dispo':'indispo')?>
                        </span>
                    </div>
                </li>
                
                </ul>
                <div class="card-footer text-muted">
                <?php ($trotinette->getIdStatus())? "<span class='badge rounded-pill bg-success'>Success</span>": ''?>
                <?=$trotinette->getDateService()?>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>