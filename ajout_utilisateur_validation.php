<?php
session_start();
include_once('./config_mysql.php');
include_once('chiffrement_data.php');
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
if (isset($_POST['prenom']) || isset($_POST['nom']) || isset($_POST['email']) || isset($_POST['mdp']) || isset($_POST['user_type'])){

/*ajouter une ligne pour vérifier que l'utilisateur n'est pas déjà dans la database et donc ne pas faire un doublon*/

$sqlQuery3 = 'INSERT INTO users(prenom,nom,email,mdp,user_type) VALUES(:prenom,:nom,:email,:mdp,:user_type)';
$insertUser = $db -> prepare($sqlQuery3);
$insertUser -> execute([
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'email' => $_POST['email'],
        'mdp' => cryptData($_POST['mdp']),
        'user_type' => $_POST['user_type']
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
                Ajout d'un Utilisateur
            </h1>
    </div>

    <div class="interface">
        <div class="ajout">
            <h1>Ajout de l'utilisateur réussie !</h1>
            <h3>
            <?php echo ('Prénom :'.$_POST['prenom'])."<br>"; ?>
            <?php echo ('Nom :'.$_POST['nom'])."<br>"; ?>
            <?php echo ("Type d'utilisateur :".$_POST['user_type'])."<br>"; ?>
            <?php echo ('Email :'.$_POST['email'])."<br>"; ?>
            <?php echo ('Mot de Passe :'.$_POST['mdp'])."<br>"; ?>
            </h3>
        </div>
    </div>

    <div class = "boutons">
        <div class="return">
            <a class="bouton" href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
        </div>
        <div class="return_ajout">
            <a class="bouton" href="//localhost/projet/ajout_utilisateur.php"> Retour à la page d'ajout d'un utilisateur </a>

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
            <a class="bouton" href="//localhost/projet/ajout_utilisateur.php"> Retour à la page d'ajout d'un utilisateur </a>

        </div>
    </div>


<?php
}
?>

</body>
</html>