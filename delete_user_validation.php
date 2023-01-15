<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant de l'utilisateur pour le modifier.");
    return;
}	

$retrieveUser = $db -> prepare('SELECT * FROM users WHERE id_user=:id');
$retrieveUser ->execute([
    'id' => $getData['id'],
]);

$user = $retrieveUser->fetch(PDO::FETCH_ASSOC);

if (isset($user['prenom']) || isset($user['nom']) || isset($user['id_user']) || isset($user['user_type'])){
?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update.css"  type="text/css"/>
    <title>Validation de la suppression </title>
</head>


<!-------------- BODY -------------->

<body>

    <div class=top>
            <h1>
                Suppression d'un Utilisateur
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
        <h1>Voulez vous vraiment supprimer cet utilisateur ?</h1>
    <h3>
     <?php echo ('Prenom :'.$user['prenom'])."<br>"; ?>
     <?php echo ('Nom :'.$user['nom'])."<br>"; ?>
     <?php echo ('Type d\'utilisateur :'.$user['user_type'])."<br>"; ?>
     <?php echo ('Identifiant d\'utilisateur :'.$user['id_user'])."<br>"; ?>
     <?php echo ('Email :'.$user['email'])."<br>"; ?>
    </h3>
        </div>
    <div class=boutondel>
        <a class="boutondelete" href="//localhost/projet/delete_user_validation2.php?id=<?php echo($user['id_user']);?>">Supprimer</a>
    </div>
    </div>
  
    <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    </div>
  
</body>

<?php
}
else{
    echo('il faut des données fournies qui respectent le format demandé');
?>
<div class=return>
    <div class=bouton>
        <a href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    </div>
</div>

<?php
}
?>

</html>