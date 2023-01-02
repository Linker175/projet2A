<?php
include_once('variables.php');

// Validation du formulaire de connexion 

if (isset($_POST['email']) &&  isset($_POST['password'])) {
    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            $loggedUser = [
                'email' => $user['email'],
                'user_type' => $user['user_type']
            ];
            setcookie(
                'USER_LOGGED',
                $loggedUser['email'],
                [
                    'expires' => time() + 120,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'USER_TYPE',
                $loggedUser['user_type'],
                [
                    'expires' => time() + 120,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'USER_NAME',
                $user['full_name'],
                [
                    'expires' => time() + 120,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
                $_POST['email'],
                $_POST['password']
            );
        }
    }
}


if (isset($_COOKIE['USER_LOGGED'])) {
    $loggedUser = [
        'email' => $_COOKIE['USER_LOGGED'],
    ];
}

if (isset($_SESSION['USER_LOGGED'])) {
    $loggedUser = [
        'email' => $_SESSION['USER_LOGGED'],
    ];
}

if (isset($_COOKIE['USER_TYPE'])) {
    $loggedUser = [
        'user_type' => $_COOKIE['USER_TYPE'],
    ];
}

if (isset($_SESSION['USER_TYPE'])) {
    $loggedUser = [
        'user_type' => $_SESSION['USER_TYPE'],
    ];
}

?>

<!------ Si utilisateur non identifie on affiche le formulaire ------>
<?php if(!isset($loggedUser)): ?>
<form action="login.php" method="post">

<!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>

    <?php endif; ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
    </div>

    <div class="mb-3">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<!------ Si utilisateur/trice bien connecté on le renvoie vers sa page dédiée ------>
<?php else: ?>
    <?php if($loggedUser['user_type']==='user'): ?>
    <div>
        <?php echo($loggedUser['user_type']) ?>
       <meta http-equiv="Refresh" content="0; url=//localhost/projet/user_page.php" />
    </div>
    <?php elseif($loggedUser['user_type']==='admin'): ?>
    <div>
        <meta http-equiv="Refresh" content="0; url=//localhost/projet/admin_page.php" />
    </div>
    <?php endif; ?>
<?php endif; ?>