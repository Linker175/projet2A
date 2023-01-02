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

if (isset($arceau['lattitude']) || isset($arceau['longitude']) || isset($arceau['etat']) || isset($arceau['id_user']) || isset($arceau['groupe'])){
?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update_arceau.css"  type="text/css"/>
    <title>Validation de la suppression </title>
</head>


<!-------------- BODY -------------->

<body>

    <div class=top>
            <h1>
                Suppression d'un Arceau
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
        <h1>Voulez vous vraiment supprimer cet arceau ?</h1>
    <h3>
     <?php echo ('Latitude :'.$arceau['lattitude'])."<br>"; ?>
     <?php echo ('Longitude :'.$arceau['longitude'])."<br>"; ?>
     <?php echo ('État :'.$arceau['etat'])."<br>"; ?>
     <?php echo ('Utilisateur :'.$arceau['id_user'])."<br>"; ?>
     <?php echo ('Groupe :'.$arceau['groupe'])."<br>"; ?>
    </h3>
        </div>
    <div class=boutondel>
        <a class="boutondelete" href="//localhost/projet/delete_arceau_validation2.php?id=<?php echo($arceau['id_arceau']);?>">Supprimer</a>
    </div>
    </div>
  
    <div class="return">
            <a class="bouton" href="//localhost/projet/ajout_arceau.php"> Retour à la page d'administration </a>
    </div>
  
</body>

<?php
}
else{
    echo('il faut des données fournies qui respectent le format demandé');
?>
<div class=return>
    <div class=bouton>
        <a href="//localhost/projet/ajout_arceau.php"> Retour à la page d'administration </a>
    </div>
</div>

<?php
}
?>

</html>