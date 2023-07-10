<?php
require_once('../config/config.php');

$email = $_POST['email'];
$password = $_POST['mot_de_passe'];

if (!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM utilisateur WHERE email = '$email'";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&:?])[A-Za-z\d@$!%*?&:?]{8,}$/", $password)) {
                if (password_verify($password, $user['mot_de_passe'])) {
                    session_start();
                    $_SESSION['user'] = $user['identifiant'];
                    header('Location: ../index.php');
                    exit();
                } else {
                    echo "<script>alert('Le mot de passe est incorrect')</script>";
                    echo "<script>window.location.href='../login.php'</script>";
                }
            } else {
                echo "<script>alert('Le mot de passe doit comporter au moins 8 caractères dont au moins une majuscule, une minuscule, un chiffre et un caractère spécial')</script>";
                echo "<script>window.location.href='../login.php'</script>";
            }
        } else {
            echo "<script>alert('L'email n'est pas valide')</script>";
            echo "<script>window.location.href='../login.php'</script>";
        }
    } else {
        echo "<script>alert('L'utilisateur n'existe pas')</script>";
        echo "<script>window.location.href='../login.php'</script>";
    }
} else {
    echo "<script>alert('Veuillez remplir tous les champs !')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}
