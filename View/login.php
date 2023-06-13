<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Connexion</h1>
            <form action="Controller/login.contr.php" method="post">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" name="mot_de_passe">
                </div>
                <input type="submit" value="Connexion" class="btn">
            </form>
            <a href="?register" class="link">Créer un compte</a>
        </div>
    </div>
</body>

</html>