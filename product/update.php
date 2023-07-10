<?php
require_once('../config/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}

// get the product id from the url
$product_id = $_GET['product_id'];

$sql = 'SELECT * FROM produit WHERE identifiant = :identifiant';
$stmt = $db->prepare($sql);
$stmt->bindValue(':identifiant', $product_id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link rel="stylesheet" href="../assets/styles/auth.css">
</head>

<body>
    <div class="grid-center">
        <div class="card">
            <h1>Modifier un produit</h1>
            <form action="./update.contr.php" method="post">
                <div class="input-group">
                    <label for="nom">Nom du produit :</label>
                    <input type="text" name="nom" value="<?= $product['nom'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="quantite">Quantité :</label>
                    <input type="text" name="quantite" value="<?= $product['quantite'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="fait_a">Fait à :</label>
                    <select name="fait_a">
                        <option value="Toulon">Toulon</option>
                        <option value="La Garde">La Garde</option>
                        <option value="Draguignan">Draguignan</option>
                    </select>
                </div>
                <input type="hidden" name="product_id" value="<?= $product_id ?>">
                <input type="submit" value="Modifier" class="btn">
            </form>
            <a href="../products.php" class="link">Retour</a>
        </div>
    </div>
</body>

</html>