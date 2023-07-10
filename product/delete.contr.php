<?php
require_once('../config/config.php');

// get the product id from the url
$product_id = $_GET['product_id'];

$sql = 'DELETE FROM produit WHERE identifiant = :identifiant';
$stmt = $db->prepare($sql);
$stmt->bindValue(':identifiant', $product_id);
$stmt->execute();

echo "<script>alert('Le produit a bien été supprimé')</script>";
echo "<script>window.location.href='../products.php'</script>";
