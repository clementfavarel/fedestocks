<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Inscription</h1>
            <form action="Controller/register.contr.php" method="post">
                <div class="input-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom">
                </div>
                <div class="input-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom">
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email">
                </div>
                <div class="input-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" name="mot_de_passe">
                </div>
                <div class="input-group">
                    <label for="confirmation_mot_de_passe">Confirmation du mot de passe:</label>
                    <input type="password" name="confirmation_mot_de_passe">
                </div>
                <input type="submit" value="Inscription" class="btn">
            </form>
            <a href="?login" class="link">Se connecter</a>
        </div>
    </div>
</body>

</html>