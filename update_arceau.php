<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant d'arceau pour le modifier.");
    return;
}	

$retrieveArceau = $db -> prepare('SELECT * FROM arceau WHERE id_arceau=:id');
$retrieveArceau ->execute([
    'id' => $getData['id'],
]);

$arceau = $retrieveArceau->fetch(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_admin_page.css"  type="text/css"/>
    <title>Modification Arceau</title>
</head>


<!-------------- FORMULAIRE DE MODIFCATION DE LA BASE DE DONNE --------------> 

<form action="update_arceau_validation.php?id=<?php echo($getData['id'])?>" method="post">
    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="coords">
        <label for="lattitude" class="form-label">Latitude</label>
        <input type="number" class="form-control" id="latitude_add" name="lattitude" step="0.0000001" placeholder="+/- 00.0000000", value= <?php echo($arceau['lattitude']); ?>>

        <label for="longitude" class="form-label">Longitude</label>
        <input type="number" class="form-control" id="longitude_add" name="longitude" step="0.0000001" placeholder="+/- 00.0000000", value= <?php echo($arceau['longitude']); ?>>
    </div>

    <div class="etat">
        <label for="etat" class="form-label">État</label>
        <input type="number" class="form-control" id="etat_add" name="etat"  placeholder="0 or 1", value= <?php echo($arceau['etat']); ?>>
    </div>

    <div class="id_user">
        <label for="id_user" class="form-label">Utilisateur</label>
        <input type="number" class="form-control" id="utilisateur_add" name="id_user"  placeholder="1", value= <?php echo($arceau['id_user']); ?>>
    </div>

    <div class="groupe">
        <label for="groupe" class="form-label">Groupe</label>
        <input type="number" class="form-control" id="groupe_add" name="groupe"  placeholder="1", value= <?php echo($arceau['groupe']); ?>>
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
    <a class="button_delete" href="./delete_arceau_validation.php?id=<?php echo($getData['id']); ?>">Supprimer</a>
</form>



<br>
<a href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>

