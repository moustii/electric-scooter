<?php 
ob_start();
$title = "Admin Liste trotinettes";
$description = "La page admin listant les trotinettes";
?>

<table class="table text-center">
    <tr class="table-dark sticky-top">
        <th>Image</th>
        <th>Nom</th>
        <th>Couleur</th>
        <th>Vitesse Max km/h</th>
        <th>Autonomie km</th>
        <th>Prix €</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php foreach($trotinettes as $key => $trotinette): ?>
    <tr>            
        <td class="align-middle">
            <?php for($i=0; $i< count($images); $i++): ?>
                <?php if($images[$i]['id_trotinette'] === $trotinette['id_trotinette']): ?>
                    <img class="d-block img-fluid persoImg mx-auto" src="<?=URL?>public/sources/images/trotinettes/<?=$images[$i]['url_image']?>" alt="<?=$trotinette['label_trotinette']?>">
                <?php endif;?>
            <?php endfor;?>
        </td>
        <td class="align-middle"><?=$trotinette['label_trotinette']?></td>
        <td class="align-middle"><?=$trotinette['color']?></td>
        <td class="align-middle"><?=$trotinette['speed']?></td>
        <td class="align-middle"><?=$trotinette['battery_life']?></td>
        <td class="align-middle"><?=$trotinette['price']?></td>
        <td class="align-middle px-0 mx-0">
            <a href="<?=URL?>trotinettes/u/<?=$trotinette['id_trotinette']?>" class="btn btn-warning"><i class="bi bi-pen"></i></a>
        </td>
        <td class="align-middle px-0 mx-0">
            <form action="<?=URL?>trotinettes/d/<?=$trotinette['id_trotinette']?>" method="POST" onsubmit="return confirm('Voulez-vous supprimer ?')">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="text-center">
    <a href="<?=URL?>trotinettes/c" class="btn btn-primary"><i class="bi bi-plus-square"> Ajouter</i></a>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item <?=($currentPage === 1)? 'disabled':'' ?>">
            <a class="page-link" href="<?=URL?>dashboard/<?=$currentPage -1?>">Précédent</a>
        </li>
        <?php for($i=1; $i<=$totalPage; $i++):?>
        <li class="page-item <?=($currentPage === $i)? 'active':'' ?>">
            <a class="page-link" href="<?=URL?>dashboard/<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor;?>
        <li class="page-item <?=($currentPage === $totalPage)? 'disabled':'' ?>">
            <a class="page-link" href="<?=URL?>dashboard/<?=$currentPage+1?>">Suivant</a>
        </li>
    </ul>
</nav>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>