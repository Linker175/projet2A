<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant d'utilisateur pour le modifier.");
    return;
}	

$deleteUser = $db -> prepare('DELETE FROM users WHERE id_user=:id');
$deleteUser ->execute([
    'id' => $getData['id'],
]);

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
<div class="top">
            <h1>
                Suppression d'un Utilisateur
            </h1>
</div>

<div class="interface"> 
    <div class="deleted">
    <h1 class="deleted">UTILISATEUR SUPPRIME<h1>

    <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    </div>
</div>

</body>
</html>