<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/globals.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/img/logo_FEDET_wo_text.png" alt="Logo FEDET" height="60">
            <a class="navbar-brand fs-1 ms-2" href="index.php">FEDEstocks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navigation" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Utilisateurs</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="logout.php">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4 grid-center">
        <div class="content">
            <h1 class="text-center">Bienvenue sur FEDEstocks</h1>
            <p class="text-center mt-4">
                FEDEstocks est une application web disponible sur tous les supports (PC, tablette, smartphone) qui permet de gérer les stocks des différentes distributions alimentaires.
                <br>
                En effet, vous n'êtes pas sans savoir que les distributions alimentaires n'écoulent que très rarement tout ce qui à été livré.
                <br>
                C'est pourquoi cette application à vu le jour. Grâce à elle, vous pourrez gérer vos stocks et <i>de facto</i> savoir quels produits sont en stock dans quelle distribution.
            </p>
        </div>
    </div>
</body>

</html>

<?php
echo "<script>console.log('" . $_SESSION['user'] . "' );</script>";
?>