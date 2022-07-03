<?php 
ob_start();
$title = "Nos trotinettes";
$description = "La page listant les trotinettes";
?>

<form action="<?=URL?>trotinettes/cv" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="label" class="form-label">Libelle : </label>
        <input type="text" class="form-control" id="label" name="label" placeholder="Renseigner le champs" required>
    </div>
    <div class="mb-3">
        <label for="serialNumber" class="form-label">N°serie : </label>
        <input type="text" minlength="11"  maxlength="11" class="form-control" id="serialNumber" name="serialNumber" placeholder="Renseigner le champs" required>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Couleur : </label>
        <input type="text" class="form-control" id="color" name="color" placeholder="Renseigner le champs" required>
    </div>
    <div class="mb-3">
        <label for="speed" class="form-label">Vitesse max km/h : </label>
        <input type="number" class="form-control" id="speed" name="speed" placeholder="Renseigner le champs" required>
    </div>
    <div class="mb-3">
        <label for="battery" class="form-label">Autonomie km : </label>
        <input type="number" class="form-control" id="battery" name="battery" placeholder="Renseigner le champs" required>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix : </label>
        <input type="number" class="form-control" id="price" name="price" placeholder="Renseigner le champs" required>
    </div>
    <select class="form-select" name="status" aria-label="Default select example">
        <option selected>Définissez le statut de la trotinette</option>
        <option value="1">dispo</option>
        <option value="2">indispo</option>
    </select>
    <div class="mb-3">
        <label for="description" class="form-label">Description : </label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image(s) : </label>
        <input class="form-control" type="file" id="image" name="image[]" accept=".png, .jpg" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<?php
$content = ob_get_clean();
require 'views/commons/template.php';
?>