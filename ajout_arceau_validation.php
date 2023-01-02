<?php
session_start();
include_once('./config_mysql.php');
?>

<!------ VALIDATION DU FORMULAIRE D'AJOUT ------->

<?php
if (isset($_POST['latitude']) || isset($_POST['longitude']) || isset($_POST['etat']) || isset($_POST['utilisateur']) || isset($_POST['groupe'])){

/*ajouter une ligne pour vérifier que l'arceau n'est pas déjà dans la database et donc ne pas faire un doublon*/

$sqlQuery2 = 'INSERT INTO arceau(lattitude,longitude,etat,id_user,groupe) VALUES(:lattitude,:longitude,:etat,:id_user,:groupe)';
$insertArceau = $db -> prepare($sqlQuery2);
$insertArceau -> execute([
        'lattitude' => $_POST['latitude'],
        'longitude' => $_POST['longitude'],
        'etat' => $_POST['etat'],
        'id_user' => $_POST['utilisateur'],
        'groupe' => $_POST['groupe']
]);

?>

<body class="user_body">
    <div class="container">
        <h1>Ajout de l'arceau réussie !</h1>

     <?php echo ('Latitude :'.$_POST['latitude'])."<br>"; ?>
     <?php echo ('Longitude :'.$_POST['longitude'])."<br>"; ?>
     <?php echo ('État :'.$_POST['etat'])."<br>"; ?>
     <?php echo ('Utilisateur :'.$_POST['utilisateur'])."<br>"; ?>
     <?php echo ('Groupe :'.$_POST['groupe'])."<br>"; ?>



    </div>

    
    <a href="//localhost/projet/admin_page.php"> Retour à la page d'administration </a>
    <br>
    <a href="//localhost/projet/admin_page.php"> Retour à la page d'ajout d'un arceau </a>

</body>

<?php
}
else{
    echo('il faut des données fournies qui respectent le format demandé');
?>


    <div class=boutton>
        <a href="//localhost/projet/ajout_arceau.php"> Retour à la page d'administration </a>
    </div>

    <br>

    <div class=boutton>
        <a href="//localhost/projet/admin_page.php"> Retour à la page d'ajout d'un arceau </a>

    </div>

<?php
}
?>