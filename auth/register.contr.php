<?php
require_once('../config/config.php');

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['mot_de_passe'];
$confirmation = $_POST['confirmation_mot_de_passe'];

if (!empty($prenom) && !empty($nom) && !empty($email) && !empty($password) && !empty($confirmation)) {
    $sql = "SELECT * FROM utilisateur WHERE email = '$email'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&:?])[A-Za-z\d@$!%*?&:?]{8,}$/", $password)) {
                if ($password == $confirmation) {
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO utilisateur (prenom, nom, email, mot_de_passe) VALUES ('$prenom', '$nom', '$email', '$password')";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();

                    $sql = "SELECT * FROM utilisateur WHERE email = '$email'";
                    $stmt = $db->prepare($sql);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    session_start();
                    $_SESSION['user'] = $user['identifiant'];

                    echo "<script>alert('L'utilisateur a bien été créé')</script>";
                    echo "<script>window.location.href='../index.php'</script>";
                } else {
                    echo "<script>alert('Les mots de passe ne correspondent pas')</script>";
                    echo "<script>window.location.href='../register.php'</script>";
                }
            } else {
                echo "<script>alert('Le mot de passe doit comporter au moins 8 caractères dont au moins une majuscule, une minuscule, un chiffre et un caractère spécial')</script>";
                echo "<script>window.location.href='../register.php'</script>";
            }
        } else {
            echo "<script>alert('L'email n'est pas valide')</script>";
            echo "<script>window.location.href='../register.php'</script>";
        }
    } else {
        echo "<script>alert('L'utilisateur existe déjà')</script>";
        echo "<script>window.location.href='../register.php'</script>";
    }
} else {
    echo "<script>alert('Veuillez remplir tous les champs !')</script>";
    echo "<script>window.location.href='../register.php'</script>";
}
