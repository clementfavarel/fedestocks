<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>

<body>
    <div class="grid-center">
        <div class="card">
            <h1>Ajouter un produit</h1>
            <form action="./add.contr.php" method="post">
                <div class="input-group">
                    <label for="nom">Nom du produit :</label>
                    <input type="text" name="nom" placeholder="Purée Mousline" required>
                </div>
                <div class="input-group">
                    <label for="quantite">Quantité :</label>
                    <input type="text" name="quantite" placeholder="3 boites" required>
                </div>
                <div class="input-group">
                    <label for="fait_a">Fait à :</label>
                    <select name="fait_a">
                        <option value="Toulon">Toulon</option>
                        <option value="La Garde">La Garde</option>
                        <option value="Draguignan">Draguignan</option>
                    </select>
                </div>
                <input type="hidden" name="par_utilisateur" value="<?= $_SESSION['user'] ?>">
                <input type="submit" value="Ajouter" class="btn">
            </form>
            <a href="../products.php" class="link">Retour</a>
        </div>
    </div>
</body>

</html>