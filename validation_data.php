<?php
include_once('./config_mysql.php');


/* VALIDATION DE LA DATA */

/*à partir de ce qui est posé dans le formulaire*/
if (isset($_POST['email']) &&  isset($_POST['mdp'])) {
        /* MySQL */
        $retrieveUser = $db -> prepare('SELECT email,mdp,user_type,nom FROM users WHERE email=:email');
        $retrieveUser ->execute([
        'email' => $_POST['email'],                                                          
        ]);
        $user = $retrieveUser->fetch(PDO::FETCH_ASSOC); //on cherche des données de l'utilisateur associé à cet email

        if($user === false) {   //on vérifie l'adresse mail, si la condition est vraie, on envoie un message d'erreur sur l'email
            $errorMessage = sprintf('Aucun utilisateur existe à cet email : (%s)',
            $_POST['email']
        );
        }
        elseif(verifyDataCrypted($_POST['mdp'],$user['mdp'])){  //on vérifie le mot de passe

            $loggedUser = [                                               //on accepte le login
                'email' => $user['email'],
                'user_type' => $user['user_type']
            ];
    
            setcookie(                                                    
                'USER_LOGGED',
                $loggedUser['email'],
                [
                    'expires' => time() + 60,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'USER_TYPE',
                $loggedUser['user_type'],
                [
                    'expires' => time() + 60,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'USER_NAME',
                $user['nom'],
                [
                    'expires' => time() + 60,
                    'secure' => true,
                    'httponly' => true,
                ]
            );

        }
        else{                   //sinon on a une erreur lié au mdp
            $errorMessage = sprintf('Erreur d\'identifiants : (%s)(%s)',
            $_POST['email'],
            $_POST['mdp']
        );
        }
}

/*à partir des cookies*/
if (isset($_SESSION['USER_LOGGED'])) {              // Pour la session en cours (côté serveur), on récupère l'email associé à l'utilisateur
    $loggedUser = [
        'email' => $_SESSION['USER_LOGGED'],
    ];
}

if (isset($_SESSION['USER_TYPE'])) {                // Pour la session en cours (côté serveur), on récupère le type d'utilisateur
    $loggedUser = [
        'user_type' => $_SESSION['USER_TYPE'],
    ];
}
?>