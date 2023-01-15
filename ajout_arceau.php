<?php 
session_start();
include_once('./config_mysql.php'); ?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ajout_arceau.css"  type="text/css"/>
    <title>Ajout Arceau</title>
</head>

<!-------------- BODY -------------->
<body>

    <div class=top>
            <h1>
                Ajout d'un Arceau
            </h1>
    </div>
<!-------------- FORMULAIRE D'AJOUT A LA BASE DE DONNE --------------> 
    <div class= interface>

    <form action="ajout_arceau_validation.php" method="post">

        <?php if(isset($errorMessage)) : ?>
        
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>

        <?php endif; ?>

        <div class="form_div">
            <label for="latitude" class="form_text">Latitude</label>
            <input type="number" class="form" id="latitude_add" step="0.0000001" name="latitude" placeholder="+/- 00.0000000">
        </div>

        <div class="form_div">
            <label for="longitude" class="form_text">Longitude</label>
            <input type="number" class="form" id="longitude_add" step="0.0000001" name="longitude"  placeholder="+/- 00.0000000">
        </div>

        <div class="form_div">
            <label for="etat" class="form_text">État</label>
            <input type="number" class="form" id="etat_add" name="etat"  placeholder="0 or 1">
        </div>

        <div class="form_div">
            <label for="id_user" class="form_text">Utilisateur</label>
            <input type="number" class="form" id="utilisateur_add" name="id_user"  placeholder="1">
        </div>

        <div class="form_div">
            <label for="groupe" class="form_text">Groupe</label>
            <input type="number" class="form" id="groupe_add" name="groupe"  placeholder="1">
        </div >
        <div class="send">
            <button type="submit" class="bouton">Ajouter</button>
        </div>
    </form>

    </div>

    <div class="return">
        <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    </div>

</body>
</html>