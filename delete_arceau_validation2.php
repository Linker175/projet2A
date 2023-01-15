<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if (!isset($getData['id']) && is_numeric($getData['id']))
{
	echo("Il faut un identifiant d'arceau pour le modifier.");
    return;
}	

$deleteArceau = $db -> prepare('DELETE FROM arceau WHERE id_arceau=:id');
$deleteArceau ->execute([
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
                Suppression d'un Arceau
            </h1>
</div>


<div class="interface"> 
    <div class="deleted">
    <h1 class="deleted">ARCEAU SUPPRIME<h1>

    <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    </div>
</div>

</body>
</html>