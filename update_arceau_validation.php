<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if(!isset($getData['id']) || !isset($_POST['lattitude']) || !isset($_POST['longitude']) || !isset($_POST['etat']) || !isset($_POST['groupe']) || !isset($_POST['id_user'])){
	echo 'Il manque des informations pour permettre l\'édition du formulaire.'.'<br>';
    return;
}
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
//ajouter une ligne pour vérifier que l'arceau n'est pas déjà dans la database et donc ne pas faire un doublon*/
$sqlQuery2 = 'UPDATE arceau SET lattitude=:lattitude, longitude=:longitude, etat=:etat, groupe=:groupe, id_user=:id_user WHERE id_arceau=:id';
$modifyArceau = $db -> prepare($sqlQuery2);
$modifyArceau -> execute([
        'lattitude' => $_POST['lattitude'],
        'longitude' => $_POST['longitude'],
        'etat' => $_POST['etat'],
        'groupe' => $_POST['groupe'],
        'id_user' => $_POST['id_user'],
        'id' => $getData['id']
]);

?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update_arceau.css"  type="text/css"/>
    <title>Validation de la modification </title>
</head>


<!-------------- BODY -------------->

<body>
    
    <div class=top>
            <h1>
                Modification d'un Arceau
            </h1>
    </div>



    <div class="interface">
        <div class="ajout">
            <h1>Modification de l'arceau réussie !</h1>
            <h3>
                <?php echo ('Latitude :'.$_POST['lattitude'])."<br>"; ?>
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
    </div>
</body>