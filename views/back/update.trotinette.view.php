<?php 
ob_start();
$title = $trotinette['label_trotinette'];
$description = "Page descriptive d'une trotinette";
?>

<form action="<?=URL?>trotinettes/uv" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="label">Libelle : </label>
        <input type="text" class="form-control" id="label" name="label" value="<?=$trotinette->getName()?>">
    </div>
    <div class="form-group">
        <label for="speed">Vitesse max : </label>
        <input type="number" class="form-control" id="speed" name="speed" value="<?=$trotinette->getSpeed()?>">
    </div>
    <div class="form-group">
        <label for="price">Prix € : </label>
        <input type="number" class="form-control" id="price" name="price" value="<?=$trotinette->getPrice()?>">
    </div>
    
    <h5>Image : </h5>
    <img src="<?=URL?>public/images/<?=$trotinette->getImage()?>" alt="une trotinette" width="300px">

    <div class="form-group">
        <label for="image">Nouvelle image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="idTrot" value="<?=$trotinette->getId()?>">

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

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


<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>