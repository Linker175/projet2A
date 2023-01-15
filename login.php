<?php
include_once('variables.php');

// Ajout de la fonction de chiffrement des données email et password

include_once('chiffrement_data.php');
include_once('validation_data.php');
?>

<!------ Si utilisateur non identifie on affiche le formulaire ------>
<?php if(!isset($loggedUser)): ?>
<form action="login.php" method="post">

<!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

<!-- le formulaire -->
    <?php endif; ?> 
    <div class="connexion">
        <h2> Se connecter </h2>
        <div class="email">
            <label for="email" class="form_text">Email</label>
            <input type="email" class="form" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        </div>
        <div class="mdp">
            <label class="form_text" for="password">Mot de passe</label>
            <input type="password" class="form" id="mdp" name="mdp">
        </div>
    
        <div class=send>
        <button type="submit" class="bouton">Envoyer</button>
        </div>

    </div>
</form>

<!------ Si utilisateur/trice bien connecté on le renvoie vers sa page dédiée ------>
<?php else: ?>
    <?php if($loggedUser['user_type']==='Client'): ?>
    <div>
        <?php echo($loggedUser['user_type']) ?>
       <meta http-equiv="Refresh" content="0; url=//localhost/projet/user_page.php" />
    </div>
    <?php elseif($loggedUser['user_type']==='Admin'): ?>
    <div>
        <meta http-equiv="Refresh" content="0; url=//localhost/projet/admin_page.php" />
    </div>
    <?php endif; ?>
<?php endif; ?>