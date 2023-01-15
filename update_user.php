<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant d'utilisateur pour le modifier.");
    return;
}	

$retrieveUser2 = $db -> prepare('SELECT prenom,nom,user_type,email FROM users WHERE id_user=:id');
$retrieveUser2 ->execute([
    'id' => $getData['id'],
]);

$user2 = $retrieveUser2->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update.css"  type="text/css"/>
    <title>Modification Utilisateur</title>
</head>

<!-------------- BODY -------------->
<body>

    <div class=top>
            <h1>
                Modification d'un Utilisateur
            </h1>
    </div>

<!-------------- FORMULAIRE DE MODIFCATION DE LA BASE DE DONNE --------------> 
<div class="interface">

<form action="update_user_validation.php?id=<?php echo($getData['id'])?>" method="post">
    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="form_div">
        <label for="prenom" class="form_text"> Prénom</label>
        <input type="text" class="form" id="prenom_update" name="prenom", value= <?php echo($user2['prenom']); ?>>
    </div>

    <div class="form_div">
        <label for="nom" class="form_text">Nom</label>
        <input type="text" class="form" id="nom_update" name="nom", value= <?php echo($user2['nom']); ?>>
    </div>

    <div class="form_div">
            <label class="form_text">Type d'utilisateur</label>
            <input type="radio" class="form" id="user_type1" name="user_type" value="Client" <?php if($user2['user_type']='Client'){echo('checked');}?>  >
            <label for="user_type1" class="form_text">Client</label>
            <input type="radio" class="form" id="user_type2" name="user_type" value="Admin" <?php if($user2['user_type']='Admin'){echo('checked');}?> > 
            <label for="user_type2" class="form_text">Admin</label>
        </div>

    <div class="form_div">
        <label for="email" class="form_text">Email</label>
        <input type="text" class="form" id="email_add" name="email", value= <?php echo($user2['email']); ?>>
    </div>


    <div class="boutons">
        <div class="send">
                <button type="submit" class="bouton">Modifier</button>
        </div>
        <div class="send2">
            <a class="boutondelete" href="./delete_user_validation.php?id=<?php echo($getData['id']); ?>">Supprimer</a>
        </div>
        <div class="send">
            <a class="bouton" href="./user_mdp.php?id=<?php echo($getData['id']); ?>">Changer le mot de passe</a>
        </div>
    </div>
</form>

</div>

<div class="return">
        <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
</div>

</body>
</html>