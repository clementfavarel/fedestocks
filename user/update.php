<?php
require_once('../config/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

// get the product id from the url
$user_id = $_GET['user_id'];

$sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
$stmt = $db->prepare($sql);
$stmt->bindValue(':identifiant', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>

<body>
    <div class="grid-center">
        <div class="card">
            <h1>Modifier un utilisateur</h1>
            <form action="./update.contr.php" method="post">
                <div class="input-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" value="<?= $user['prenom'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" value="<?= $user['nom'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?= $user['email'] ?>" required>
                </div>
                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="submit" value="Modifier" class="btn">
            </form>
            <a href="../users.php" class="link">Retour</a>
        </div>
    </div>
</body>

</html>