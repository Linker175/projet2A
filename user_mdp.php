<?php
session_start();
include_once('./config_mysql.php');
include_once('./chiffrement_data.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant d'utilisateur pour modifier son mot de passe.");
    return;
}	

$retrieveUser = $db -> prepare('SELECT email FROM users WHERE id_user=:id');
$retrieveUser ->execute([
    'id' => $getData['id'],
]);

$user2 = $retrieveUser->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update.css"  type="text/css"/>
    <title>Modification du Mot de Passe</title>
</head>

<!-------------- BODY -------------->
<body>

    <div class=top>
            <h1>
                Modification d'un Mot de Passe Utilisateur
            </h1>
    </div>

<!-------------- FORMULAIRE DE MODIFCATION DE LA BASE DE DONNE --------------> 
<div class="interface">
    <div class="ajout">
            <h3>
                <?php echo ('Email :'.$user2['email'])."<br>"; ?>
            </h3>
        </div>

<form action="user_mdp_validation.php?id=<?php echo($getData['id'])?>" method="post">
    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="form_div">
        <label for="mdp1" class="form_text"> Nouveau Mot de Passe</label>
        <input type="password" class="form" id="mdp1" name="mdp1"; ?>>
    </div>

    <div class="form_div">
        <label for="mdp2" class="form_text">Confirmation du Mot de Passe</label>
        <input type="password" class="form" id="mdp2" name="mdp2"; ?>>
    </div>

    <div class="boutons">
        <div class="send">
                <button type="submit" class="bouton">Modifier le Mot de Passe</button>
        </div>

    </div>
</form>

</div>

<div class="return">
        <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
</div>

</body>
</html>