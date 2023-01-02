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

<div class=deleted> 
    ARCEAU SUPPRIME
</div>
<br>
<a href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
</br>
