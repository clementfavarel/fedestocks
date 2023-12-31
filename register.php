<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/styles/auth.css">
</head>

<body>
    <div class="grid-center">
        <div class="card">
            <h1>Inscription</h1>
            <form action="auth/register.contr.php" method="post">
                <div class="input-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" required>
                </div>
                <div class="input-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" name="mot_de_passe" required>
                </div>
                <div class="input-group">
                    <label for="confirmation_mot_de_passe">Confirmation du mot de passe:</label>
                    <input type="password" name="confirmation_mot_de_passe" required>
                </div>
                <input type="submit" value="Inscription" class="btn">
            </form>
            <a href="login.php" class="link">Se connecter</a>
        </div>
    </div>
</body>

</html>