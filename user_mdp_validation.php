<?php
session_start();
include_once('./config_mysql.php');
include_once('./chiffrement_data.php');

$getData = $_GET;

if(!isset($getData['id']) || !isset($_POST['mdp1']) || !isset($_POST['mdp2'])){
	echo 'Il manque des informations pour permettre l\'édition du formulaire.'.'<br>';
    return;
}
if($_POST['mdp1']!=$_POST['mdp2']){
    echo 'Les mots de passes ne concordent pas.'.'<br>';
    return;
}
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
//ajouter une ligne pour vérifier que l'arceau n'est pas déjà dans la database et donc ne pas faire un doublon*/
$sqlQuery3 = 'UPDATE users SET mdp=:mdp WHERE id_user=:id';
$sqlQuery2 = 'SELECT email FROM users WHERE id_user=:id';
$modifyUser = $db -> prepare($sqlQuery3);
$modifyUser -> execute([
        'mdp' => cryptData($_POST['mdp1']),
        'id' => $getData['id']
]);
$retrieveUser = $db -> prepare($sqlQuery2);
$retrieveUser -> execute([
        'id' => $getData['id']
]);


$infoUser = $retrieveUser->fetch(PDO::FETCH_ASSOC);
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
                Modification d'un mot de passe 
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
            <h1>Modification du mot de passe réussie !</h1>
            <h3>
                <?php echo ('Email :'.$infoUser['email'])."<br>"; ?>
                <?php echo ('Mot de passe :'.$_POST['mdp1'])."<br>"; ?>
            </h3>
        </div>
    </div>

    <div class = "boutons">
        <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
        </div>
    </div>
</body>