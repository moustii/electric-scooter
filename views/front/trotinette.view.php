<?php 
ob_start();
$title = $trotinette['label_trotinette'];
$description = "Page descriptive d'une trotinette";
?>

<div class="card mb-3 mx-auto" style="max-width: 940px;">
    <div class="row g-0">
        <div class="col-md-4">
<!-- --------------------  CAROUSEL--------------------- -->
        <div id="carouselExampleCaptions" class="carousel slide carousel-dark " data-bs-ride="carousel">
           
            <div class="carousel-inner">
                <?php foreach($image as $key => $img):?>
                <div class="carousel-item <?=($key===0)?'active':''?>">
                 <img src="<?=URL?>public/sources/images/trotinettes/<?=$img['url_image']?>" class="img-fluid" alt="<?=$trotinette['label_trotinette']?>">
                </div>
                <?php endforeach;?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
<!-- ------------------------FIN CAROUSEL------------------------- -->
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?=$trotinette['label_trotinette']?></h5>
                <p class="card-text">
                    <?=$trotinette['description_trotinette']?>
                </p>
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
                        <a class="btn btn-primary p-1 m-1 text-center" href="<?=URL?>trotinettes/page/<?=$currentPage?>">
                            <i class="bi bi-arrow-left-square p-1"> Retour</i>
                        </a>
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