<?php
require_once('../config/config.php');

$nom = $_POST['nom'];
$quantite = $_POST['quantite'];
$fait_a = $_POST['fait_a'];
$product_id = $_POST['product_id'];

if (!empty($nom) || !empty($quantite) || !empty($fait_a)) {
    $sql = "UPDATE produit SET nom = :nom, quantite = :quantite, fait_a = :fait_a WHERE identifiant = $product_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':quantite', $quantite);
    $stmt->bindValue(':fait_a', $fait_a);
    $stmt->execute();

    echo "<script>alert('Le produit a bien été modifié')</script>";
    echo "<script>window.location.href='../products.php'</script>";
} else {
    echo "<script>alert('Veuillez remplir tous les champs !')</script>";
    echo "<script>window.location.href='../product/update.php'</script>";
}
