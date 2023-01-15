<?php 
session_start();
include_once('./config_mysql.php'); ?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ajout_arceau.css"  type="text/css"/>
    <title>Ajout Utilisateur</title>
</head>

<!-------------- BODY -------------->
<body>

    <div class=top>
            <h1>
                Ajout d'un Utilisateur
            </h1>
    </div>
<!-------------- FORMULAIRE D'AJOUT A LA BASE DE DONNE --------------> 
    <div class= interface>

    <form action="ajout_utilisateur_validation.php" method="post">

        <?php if(isset($errorMessage)) : ?>
        
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>

        <?php endif; ?>

        <div class="form_div">
            <label for="prenom" class="form_text">Prénom</label>
            <input type="text" class="form" id="prenom_add" name="prenom" placeholder="Paul">
        </div>

        <div class="form_div">
            <label for="nom" class="form_text">Nom</label>
            <input type="text" class="form" id="nom_add" name="nom"  placeholder="Labee">
        </div>

        <div class="form_div">
            <label class="form_text">Type d'utilisateur</label>
            <input type="radio" class="form" id="user_type1" name="user_type" value="Client">
            <label for="user_type1" class="form_text">Client</label>
            <input type="radio" class="form" id="user_type2" name="user_type" value="Admin">
            <label for="user_type2" class="form_text">Admin</label>
        </div>

        <div class="form_div">
            <label for="email" class="form_text">Adresse Mail</label>
            <input type="email" class="form" id="email_add" name="email"  placeholder="paul.@exemple.com">
        </div>

        <div class="form_div">
            <label for="mdp" class="form_text">Mot de passe</label>
            <input type="password" class="form" id="mdp" name="mdp"  placeholder="$!e&er75ds$">
        </div>

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