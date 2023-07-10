<?php
require_once('../config/config.php');

$nom = $_POST['nom'];
$quantite = $_POST['quantite'];
$fait_a = $_POST['fait_a'];
$par_utilisateur = $_POST['par_utilisateur'];

if (!empty($nom) && !empty($quantite) && !empty($fait_a) && !empty($par_utilisateur)) {
    $sql = "INSERT INTO produit (nom, quantite, fait_a, par_utilisateur) VALUES ('$nom', '$quantite', '$fait_a', '$par_utilisateur')";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    echo "<script>alert('Le produit a bien été ajouté')</script>";
    echo "<script>window.location.href='../products.php'</script>";
} else {
    echo "<script>alert('Veuillez remplir tous les champs !')</script>";
    echo "<script>window.location.href='../product/add.php'</script>";
}
