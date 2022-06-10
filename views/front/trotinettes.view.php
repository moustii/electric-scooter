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
            <!-- <div class="card-body">
                <p class="card-text">
                
                </p>
            </div> -->
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
                <div class="card-footer text-muted text-end">
                    <?=$trotinette->getDateService()?>
                    <a href="index.php?page=trotinettes&action=r&id=<?=$trotinette->getId()?>" class="btn btn-primary p-1 m-1 text-center">
                        <i class="fa-solid fa-eye" style="color: white;"></i>
                    </a>
                </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item <?=($currentPage === 1)? 'disabled':'' ?>">
            <a class="page-link" href="index.php?page=trotinettes&p=<?=$currentPage -1?>">Précédent</a>
        </li>
        <?php for($i=1; $i<=$totalPage; $i++):?>
        <li class="page-item <?=($currentPage === $i)? 'active':'' ?>">
            <a class="page-link" href="index.php?page=trotinettes&p=<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor;?>
        <li class="page-item <?=($currentPage === $totalPage)? 'disabled':'' ?>">
            <a class="page-link" href="index.php?page=trotinettes&p=<?=$currentPage+1?>">Suivant</a>
        </li>
    </ul>
</nav>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>