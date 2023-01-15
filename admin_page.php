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
    <div class="top">
        <h1>Park'ENSEA ADMIN !</h1>
    </div>

    <div class="connected admin">
    <?php    
      if (isset($_COOKIE['USER_NAME'])){
           ?> Bienvenue à toi <?php echo($_COOKIE['USER_NAME']); 
        }
    ?>
    </div>

<!-------------- AFFICHAGE DU TABLEAU DES ARCEAUX --------------> 
    <div class="interface">
        <?php include_once('./tableau/tab_arceau.php')?>
<!-------------- AJOUT D'UN ARCEAU --------------> 
        <div class="send">
                <a class ="bouton" href="//localhost/projet/ajout_arceau.php"> Ajouter un arceau </a>
        </div> 
    </div>

    
<!-------------- AFFICHAGE DU TABLEAU DES UTILISATEURS --------------> 
    <div class="interface">
        <?php include_once('./tableau/tab_users.php')?>
        <div class="send">
                <a class ="bouton" href="//localhost/projet/ajout_utilisateur.php"> Ajouter un utilisateur</a>
        </div>
    </div> 

</body>
</html>
