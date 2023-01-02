<?php
session_start();
include_once('./config_mysql.php');
?>

<!DOCTYPE html>
<htmlx>
<!-------------- HEAD -------------->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_admin_page.css"  type="text/css"/>
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

<!-------------- AJOUTS A LA BASE DE DONNE --------------> 

<form action="ajout_arceau.php" method="post">

    <?php if(isset($errorMessage)) : ?>
    
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="coords">
        <label for="latitude" class="form-label">Latitude</label>
        <input type="number" class="form-control" id="latitude_add" name="latitude" placeholder="+/- 00.0000000">

        <label for="longitude" class="form-label">Longitude</label>
        <input type="number" class="form-control" id="longitude_add" name="longitude"  placeholder="+/- 00.0000000">
    </div>

    <div class="etat">
        <label for="etat" class="form-label">État</label>
        <input type="number" class="form-control" id="etat_add" name="etat"  placeholder="0 or 1">
    </div>

    <div class="utilisateur">
        <label for="utilisateur" class="form-label">Utilisateur</label>
        <input type="number" class="form-control" id="utilisateur_add" name="utilisateur"  placeholder="1">
    </div>

    <div class="groupe">
        <label for="groupe" class="form-label">Groupe</label>
        <input type="number" class="form-control" id="groupe_add" name="groupe"  placeholder="1">
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>


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
                <th scope="col"> Groupe </th>
            </tr>
        </thead>
  
<!-- On complète avec les données -->
    
        <tr>    
            <? while($row = $req->fetch()) { ?>
            <td><? echo "{ ".$row['longitude']." ; ".$row['lattitude']." }"; ?></td>
            <td><? echo $row['id_arceau']; ?></td>
            <td><? echo $row['etat']; ?></td>
            <td><? echo $row['id_user']; ?></td>
            <td><? echo $row['groupe']; ?></td>
        </tr>
    

    <? }   
    $req->closeCursor();   
    ?>

    </table>

</body>
</html>
