<?php
session_start();
include_once('./config_mysql.php');
?>

<!DOCTYPE html>
<html>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_admin_page.css" />
    <title>Page Admin</title>
</head>
<body class="user_body">
    <div class="container">
        <h1>Park'ENSEA ADMIN !</h1>
        <?php if(isset($loggedUser)): ?>
            Vous êtes bien connectés
        <?php endif; ?>
    </div>


    <div class="map_admin">
    <?php    
      if (isset($_COOKIE['USER_NAME'])){
           ?> Bienvenue à toi <?php echo($_COOKIE['USER_NAME']); 
        }
    ?>
    </div>

<!-------------- AFFICHAGE DE LA BASE DE DONNEE --------------> 


<!-- On prépare la requête -->

    <?php
        $sqlQuery = 'SELECT * FROM arceau ORDER BY id_arceau DESC';
        $req = $db->query($sqlQuery); 
    ?>

<!-- On affiche le tableau -->

    <table>
        <caption> Tous les arceaux </caption>
        <thead>
            <tr>
                <th scope="col"> Coordonnées </th>
                <th scope="col"> Id </th>
                <th scope="col"> État </th>
                <th scope="col"> Utilisateur </th>
            </tr>
        </thead>
  
<!-- On complète avec les données -->
    
        <tr>    
            <? while($row = $req->fetch()) { ?>
            <td><? echo "{".$row['longitude'].";".$row['lattitude']."}"; ?></td>
            <td><? echo $row['id_arceau']; ?></td>
            <td><? echo $row['etat']; ?></td>
            <td><? echo $row['id_user']; ?></td>
        </tr>
    

    <? }   
    $req->closeCursor();   
    ?>

    </table>

</body>
</html>
