<?php 
ob_start();
$title = $trotinette['label_trotinette'];
$description = "Page descriptive d'une trotinette";
?>

<form action="<?=URL?>trotinettes/uv" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="label" class="form-label">Libelle : </label>
        <input type="text" class="form-control" id="label" name="label" value="<?=$trotinette['label_trotinette']?>" required>
    </div>
    <div class="mb-3">
        <label for="serialNumber" class="form-label">N°serie : </label>
        <input type="text" minlength="11"  maxlength="11" class="form-control" id="serialNumber" name="serialNumber" value="<?=$trotinette['serial_number']?>" required>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Couleur : </label>
        <input type="text" class="form-control" id="color" name="color" value="<?=$trotinette['color']?>" required>
    </div>
    <div class="mb-3">
        <label for="speed" class="form-label">Vitesse max km/h : </label>
        <input type="number" class="form-control" id="speed" name="speed" value="<?=$trotinette['speed']?>" required>
    </div>
    <div class="mb-3">
        <label for="battery" class="form-label">Autonomie km : </label>
        <input type="number" class="form-control" id="battery" name="battery" value="<?=$trotinette['battery_life']?>" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix € : </label>
        <input type="number" class="form-control" id="price" name="price" value="<?=$trotinette['price']?>" required>
    </div> 
    <select class="form-select" name="status" aria-label="Default select example" required>
        <option value="<?=$trotinette['id_status']?>"selected>
            <?=($trotinette['id_status'] == 1)? 'Dispo':'Indispo' ?>
        </option>
        <option value="<?=($trotinette['id_status']!=1)? '1':'2'?>">
            <?=($trotinette['id_status'] == 2)? 'Dispo':'Indispo' ?>
        </option>
    </select>
    <div class="mb-3">
        <label for="description" class="form-label">Description : </label>
        <textarea class="form-control" id="description" name="description" rows="3">
            <?=$trotinette['description_trotinette']?>
        </textarea>
    </div>

    <div style="margin: 20px 0;">
        <h5>Image(s) : </h5>
        <?php foreach ($image as $key => $img): ?>
            <img src="<?=URL?>public/sources/images/trotinettes/<?=$img['url_image']?>" alt="<?=$trotinette['label_trotinette']?>" width="100px">
        <?php endforeach; ?>
    </div>

    <div class="mb-3">
        <label for="image">Nouvelle image : </label>
        <input type="file" class="form-control-file" id="image" name="image[]" multiple>
    </div>
    <input type="hidden" name="idTrot" value="<?=$trotinette['id_trotinette']?>">

    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn btn-secondary">Annuler</button>
</form>

  


<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>