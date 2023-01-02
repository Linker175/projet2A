<?php 
session_start();
include_once('./config_mysql.php'); ?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_admin_page.css"  type="text/css"/>
    <title>Ajout Arceau</title>
</head>

<!-------------- FORMULAIRE D'AJOUT A LA BASE DE DONNE --------------> 

<form action="ajout_arceau_validation.php" method="post">

    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="coords">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="number" class="form-control" id="latitude_add" step="0.0000001" name="latitude" placeholder="+/- 00.0000000">

        <label for="longitude" class="form-label">Longitude</label>
        <input type="number" class="form-control" id="longitude_add" step="0.0000001" name="longitude"  placeholder="+/- 00.0000000">
    </div>

    <div class="etat">
        <label for="etat" class="form-label">État</label>
        <input type="number" class="form-control" id="etat_add" name="etat"  placeholder="0 or 1">
    </div>

    <div class="utilisateur">
        <label for="utilisateur" class="form-label">Utilisateur</label>
        <input type="number" class="form-control" id="utilisateur_add" name="utilisateur"  placeholder="1">
    </div>

    <div class="groupe">
        <label for="groupe" class="form-label">Groupe</label>
        <input type="number" class="form-control" id="groupe_add" name="groupe"  placeholder="1">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<a href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>

