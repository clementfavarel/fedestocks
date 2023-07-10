<?php
require_once('../config/config.php');

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];

if (!empty($nom) || !empty($prenom) || !empty($email)) {
    $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE identifiant = $user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':nom', $nom);
    $stmt->bindValue(':prenom', $prenom);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    echo "<script>alert('L\'utilisateur a bien été modifié')</script>";
    echo "<script>window.location.href='../users.php'</script>";
} else {
    echo "<script>alert('Veuillez remplir tous les champs !')</script>";
    echo "<script>window.location.href='../user/update.php'</script>";
}
