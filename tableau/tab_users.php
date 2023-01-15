<!-- On prépare la requête -->

<?php
    $sqlQueryUser = 'SELECT * FROM users ORDER BY id_user DESC';
    $reqUser = $db->query($sqlQueryUser); 
?>

<!-- On affiche le tableau -->

<table>
    <caption> Tous les utilisateurs </caption>
    <thead>
        <tr>
            <th scope="col"> Prénom Nom </th>
            <th scope="col"> Id</th>
            <th scope="col"> Type d'utilisateur</th>
            <th scope="col"> Adresse mail</th>
            <th scope="col"> Modification </th>
        </tr>
    </thead>
  
<!-- On complète avec les données -->
    
    <tr>    
        <? while($rowUser = $reqUser->fetch()) { ?>
        <td><? echo $rowUser['prenom']." ".$rowUser['nom']; ?></td>
        <td><? echo $rowUser['id_user']; ?></td>
        <td><? echo $rowUser['user_type']; ?></td>
        <td><? echo $rowUser['email']; ?></td>
        <td><a class="bouton" href="./update_user.php?id=<?php echo($rowUser['id_user']); ?>">Modifier</a></td>
    </tr>
    
<? }   
$reqUser->closeCursor();   
?>

</table>
