<?php
session_start();
include_once('./config_mysql.php');
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
if (isset($_POST['lattitude']) || isset($_POST['longitude']) || isset($_POST['etat']) || isset($_POST['id_user']) || isset($_POST['groupe'])){

/*ajouter une ligne pour vérifier que l'arceau n'est pas déjà dans la database et donc ne pas faire un doublon*/

$sqlQuery2 = 'INSERT INTO arceau(lattitude,longitude,etat,id_user,groupe) VALUES(:lattitude,:longitude,:etat,:id_user,:groupe)';
$insertArceau = $db -> prepare($sqlQuery2);
$insertArceau -> execute([
        'lattitude' => $_POST['latitude'],
        'longitude' => $_POST['longitude'],
        'etat' => $_POST['etat'],
        'id_user' => $_POST['id_user'],
        'groupe' => $_POST['groupe']
]);

?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ajout_arceau.css"  type="text/css"/>
    <title>Validation de l'ajout </title>
</head>

<!-------------- BODY -------------->

<body>

    <div class=top>
            <h1>
                Ajout d'un Arceau
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
            <h1>Ajout de l'arceau réussie !</h1>
            <h3>
            <?php echo ('Latitude :'.$_POST['latitude'])."<br>"; ?>
            <?php echo ('Longitude :'.$_POST['longitude'])."<br>"; ?>
            <?php echo ('État :'.$_POST['etat'])."<br>"; ?>
            <?php echo ('Utilisateur :'.$_POST['id_user'])."<br>"; ?>
            <?php echo ('Groupe :'.$_POST['groupe'])."<br>"; ?>
            </h3>
        </div>
    </div>

    <div class = "boutons">
        <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
        </div>
        <div class="return_ajout">
            <a class="bouton" href="//localhost/projet/ajout_arceau.php"> Retour à la page d'ajout d'un arceau </a>

        </div>
    </div>

</body>

<?php
}
else{
    echo('il faut des données fournies qui respectent le format demandé');
?>
    <div class = "boutons">
        <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
        </div>
        <div class="return_ajout">
            <a class="bouton" href="//localhost/projet/ajout_arceau.php"> Retour à la page d'ajout d'un arceau </a>

        </div>
    </div>


<?php
}
?>

</body>
</html>