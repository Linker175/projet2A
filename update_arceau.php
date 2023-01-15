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
    <link rel="stylesheet" href="update.css"  type="text/css"/>
    <title>Modification Arceau</title>
</head>

<!-------------- BODY -------------->
<body>

    <div class=top>
            <h1>
                Modification d'un Arceau
            </h1>
    </div>

<!-------------- FORMULAIRE DE MODIFCATION DE LA BASE DE DONNE --------------> 
<div class="interface">

<form action="update_arceau_validation.php?id=<?php echo($getData['id'])?>" method="post">
    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="form_div">
        <label for="lattitude" class="form_text">Latitude</label>
        <input type="number" class="form" id="latitude_add" name="lattitude" step="0.0000001" placeholder="+/- 00.0000000", value= <?php echo($arceau['lattitude']); ?>>
    </div>

    <div class="form_div">
        <label for="longitude" class="form_text">Longitude</label>
        <input type="number" class="form" id="longitude_add" name="longitude" step="0.0000001" placeholder="+/- 00.0000000", value= <?php echo($arceau['longitude']); ?>>
    </div>

    <div class="form_div">
        <label for="etat" class="form_text">État</label>
        <input type="number" class="form" id="etat_add" name="etat"  placeholder="0 or 1", value= <?php echo($arceau['etat']); ?>>
    </div>

    <div class="form_div">
        <label for="id_user" class="form_text">Utilisateur</label>
        <input type="number" class="form" id="utilisateur_add" name="id_user"  placeholder="1", value= <?php echo($arceau['id_user']); ?>>
    </div>

    <div class="form_div">
        <label for="groupe" class="form_text">Groupe</label>
        <input type="number" class="form" id="groupe_add" name="groupe"  placeholder="1", value= <?php echo($arceau['groupe']); ?>>
    </div> 

    <div class="boutons">
        <div class="send">
                <button type="submit" class="bouton">Modifier</button>
        </div>
        <div class="send2">
            <a class="boutondelete" href="./delete_arceau_validation.php?id=<?php echo($getData['id']); ?>">Supprimer</a>
        </div>
    </div>
</form>

</div>

<div class="return">
        <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
</div>

</body>
</html>