<?php
session_start();
include_once('./config_mysql.php');

$getData = $_GET;

if(!isset($getData['id']) || !isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['user_type']) || !isset($_POST['email']) ){
	echo 'Il manque des informations pour permettre l\'édition du formulaire.'.'<br>';
    return;
}
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
//ajouter une ligne pour vérifier que l'arceau n'est pas déjà dans la database et donc ne pas faire un doublon*/
$sqlQuery3 = 'UPDATE users SET prenom=:prenom, nom=:nom, user_type=:user_type, email=:email WHERE id_user=:id';
$modifyUser = $db -> prepare($sqlQuery3);
$modifyUser -> execute([
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'user_type' => $_POST['user_type'],
        'email' => $_POST['email'],
        'id' => $getData['id']
]);

?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="update.css"  type="text/css"/>
    <title>Validation de la modification </title>
</head>


<!-------------- BODY -------------->

<body>
    
    <div class=top>
            <h1>
                Modification d'un Utilisateur
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
            <h1>Modification de l'utilisateur réussie !</h1>
            <h3>
                <?php echo ('Prenom :'.$_POST['prenom'])."<br>"; ?>
                <?php echo ('Nom :'.$_POST['nom'])."<br>"; ?>
                <?php echo ('Type d\'utilisateur :'.$_POST['user_type'])."<br>"; ?>
                <?php echo ('Email :'.$_POST['email'])."<br>"; ?>
            </h3>
        </div>
    </div>

    <div class = "boutons">
        <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
        </div>
    </div>
</body>