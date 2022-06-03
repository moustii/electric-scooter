<?php 
ob_start();
$title = " Welcome TrotMan";
$description = "Page accueil trotman";
?>

<div id="carouselExampleCaptions" class="carousel slide carousel-dark " data-bs-ride="carousel">
    <div class="carousel-indicators">
    <?php for($i=0; $i<3; $i++): ?>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?=$i?>" class="<?=($i===0)?'active':''?>" aria-current="true">
        </button>
    <?php endfor; ?>
        <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2">
        </button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3">
        </button> -->
    </div>
    <div class="carousel-inner">
        <?php foreach($trotinettes as $key => $trotinette):?>
        <div class="carousel-item <?=($key===0)?'active':''?>">
            <img src="public/sources/images/nouveautes/<?=$trotinette['url_image']?>" class="d-block w-50 h-50 mx-auto img-thumbnail border border-light" alt="<?=$trotinette['label_image']?>">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="persoColorBlack"><?=$trotinette['label_image']?></h5>
                <p class="persoColorBlack"><?=$trotinette['description_image']?>
                </p>
            </div>
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

<h2 class="text-center m-2 border-bottom border-secondary my-4">Présentation</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo cumque odit asperiores, eaque atque molestias, non illum voluptates provident expedita illo. Eligendi illum laudantium, earum cum excepturi odit vel perspiciatis!
    Blanditiis, excepturi consequatur? Deserunt, repellat blanditiis? Asperiores tempore voluptatum quaerat, veniam, impedit autem nisi, cumque ipsa consequuntur quam tempora? Vel veniam voluptates corrupti est cum laborum amet nulla quo ipsum.
    Vel, mollitia laboriosam culpa neque consectetur animi necessitatibus rem reprehenderit et, ut, placeat praesentium minima? Quam ab magni velit inventore veritatis voluptate, praesentium tenetur, et rerum id dolores aperiam ut.
    Obcaecati hic aperiam maiores dicta voluptatum ratione sapiente velit repudiandae repellendus ipsa in vitae perferendis commodi error molestiae, deleniti sequi asperiores corrupti autem perspiciatis qui laboriosam excepturi ducimus? Temporibus, aliquid?
</p>

<h2 class="text-center m-2 border-bottom border-secondary my-4">Nos services</h2>
<div class="row no-gutters my-3">
    <div class="col-lg-4 border border-light rounded p-3">
        <h3>Location</h3>
        <p>Louez une de nos trotinettes les plus performantes du moments, une large gamme au choix...</p>
    </div>
    <div class="col-lg-4 border border-light rounded p-3">
        <h3 class="text-center">Apprentissage</h3>
        <p>En présence de nos coachs, surmontez votre peur en franchissant la colline perdu...</p>
    </div>
    <div class="col-lg-4 border border-light rounded p-3">
        <h3 class="text-end">Atelier réparations</h3>
        <p>Apprenez à maintenir votre trotinette en parfaite état. Vous pouvez nous rapporter n'importe quelle trotinette...</p>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>