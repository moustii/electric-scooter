<?php 
ob_start();
$title = "Nos trotinettes";
$description = "La page listant les trotinettes";
?>

<div class="row no-gutters">
    <?php foreach($trotinettes as $key => $trotinette):?>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card mb-3">
            <h3 class="card-header text-center"><?=$trotinette['label_trotinette']?></h3>

            <?php foreach($images as $image): ?>
                <?php if ($trotinette['id_trotinette']===$image['id_trotinette']): ?>
                <img class="img-fluid persoImg mx-auto my-2" src="<?=URL?>public/sources/images/trotinettes/<?=$image['url_image']?>" alt="<?=$trotinette['label_trotinette']?>">
                <?php endif; ?>
            <?php endforeach; ?>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Couleur : <?=$trotinette['color']?></li>
                <li class="list-group-item">Vitesse max : <?=$trotinette['speed']?> km/h</li>
                <li class="list-group-item">Autonomie <?=$trotinette['battery_life']?> km</li>
                <li class="list-group-item">
                    Prix : <?=$trotinette['price']?> €
                    <div class="text-end">
                        <span class="badge rounded-pill <?=($trotinette['id_status']==1)? 'bg-success':'bg-danger'?>">
                            <?=($trotinette['id_status']==1)? 'dispo':'indispo'?>
                        </span>
                    </div>
                </li>    
            </ul>
                <div class="card-footer text-muted text-end">
                    <?=$trotinette['date_service']?>
                    <a href="<?=URL?>trotinettes/r/<?=$trotinette['id_trotinette']?>/<?=$currentPage?>" class="btn btn-primary p-1 m-1 text-center perso-icon-circle" id="btn<?=$trotinette['id_trotinette']?>" onclick="animation(<?=$trotinette['id_trotinette']?>)">
                        <i class="fa-solid fa-eye" id="eye<?=$trotinette['id_trotinette']?>" style="color: white;"></i>
                    </a>
                </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item <?=($currentPage === 1)? 'disabled':'' ?>">
            <a class="page-link" href="<?=URL?>trotinettes/page/<?=$currentPage -1?>">Précédent</a>
        </li>
        <?php for($i=1; $i<=$totalPage; $i++):?>
        <li class="page-item <?=($currentPage === $i)? 'active':'' ?>">
            <a class="page-link" href="<?=URL?>trotinettes/page/<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor;?>
        <li class="page-item <?=($currentPage === $totalPage)? 'disabled':'' ?>">
            <a class="page-link" href="<?=URL?>trotinettes/page/<?=$currentPage+1?>">Suivant</a>
        </li>
    </ul>
</nav>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>