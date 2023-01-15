<?php
session_start();
?>

<!DOCTYPE html>
<html>

<!-------------- HEAD -------------->
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_home.css" />
        <title>Reserv'Park</title>
        <link rel="icon" type="image/png" sizes="64x64" href="image_onglet.png">
    </head>

<!-------------- BODY -------------->
    <body>
        <div class=top>
            <h1>
                Reserv'Park
            </h1>
        </div>

        <!-- acces a l'interface de connexion -->
        <div class="Connexion">
            <?php include_once('./login.php');?>
        </div>
                    
    </body>
</html>

    