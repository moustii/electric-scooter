<?php 
ob_start();
$title = "Admin Liste trotinettes";
$description = "La page admin listant les trotinettes";
?>

<table class="table text-center">
    <tr class="table-dark">
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
            <img class="img-fluid persoImg mx-auto my-2" src="public/sources/images/trotinettes/<?=$trotinette->getUrlImage()?>" alt="<?=$trotinette->getLabelImage()?>">
        </td>
        <td class="align-middle"><?=$trotinette->getLabel()?></td>
        <td class="align-middle"><?=$trotinette->getColor()?></td>
        <td class="align-middle"><?=$trotinette->getSpeed()?></td>
        <td class="align-middle"><?=$trotinette->getBatteryLife()?></td>
        <td class="align-middle"><?=$trotinette->getPrice()?></td>
        <td class="align-middle px-0"><a href="<?=URL?>trotinettes/u/<?=$trotinette->getId()?>" class="btn btn-warning"><i class="bi bi-pen"></i></a></td>
        <td class="align-middle px-0">
            <form action="<?=URL?>trotinettes/d/<?=$trotinette->getId()?>" method="POST" onsubmit="return confirm('Voulez-vous supprimer ?')">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="text-center">
    <a href="index.php?page=trotinettes&action=c" class="btn btn-primary"><i class="bi bi-plus-square"> Ajouter</i></a>
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