<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_user_page.css" />
    <title>Page utilisateur</title>
</head>
<body class="user_body">
    <div class="container">
        <h1>Park'ENSEA USER !</h1>
        <?php if(isset($loggedUser)): ?>
            Vous êtes bien connectés
        <?php endif; ?>
    </div>
</body>
</html>

