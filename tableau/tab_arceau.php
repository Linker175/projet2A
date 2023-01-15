<!-- On prépare la requête -->

<?php
    $sqlQueryArceau = 'SELECT * FROM arceau ORDER BY id_arceau DESC';
    $reqArceau = $db->query($sqlQueryArceau); 
?>

<!-- On affiche le tableau -->

<table>
    <caption> Tous les arceaux </caption>
    <thead>
        <tr>
            <th scope="col"> Coordonnées </th>
            <th scope="col"> État</th>
            <th scope="col"> Utilisateur</th>
            <th scope="col"> Groupes </th>
            <th scope="col"> Id </th>
            <th scope="col"> Modification </th>
        </tr>
    </thead>
  
<!-- On complète avec les données -->
    
    <tr>    
        <? while($rowArceau = $reqArceau->fetch()) { ?>
        <td><? echo "{ ".$rowArceau['longitude']." ; ".$rowArceau['lattitude']." }"; ?></td>
        <td><? echo $rowArceau['etat']; ?></td>
        <td><? echo $rowArceau['id_user']; ?></td>
        <td><? echo $rowArceau['groupe']; ?></td>
        <td><? echo $rowArceau['id_arceau']; ?></td>
        <td><a class="bouton" href="./update_arceau.php?id=<?php echo($rowArceau['id_arceau']); ?>">Modifier</a></td>
    </tr>
    
<? }   
$reqArceau->closeCursor();   
?>
</table>