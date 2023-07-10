<?php
require_once('config/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$sql = 'SELECT * FROM utilisateur';
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/globals.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/img/logo_FEDET_wo_text.png" alt="Logo FEDET" height="60">
            <a class="navbar-brand fs-1 ms-2" href="?">FEDEstocks (beta)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navigation" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="users.php">Utilisateurs</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="logout.php">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <h1 class="mt-3">Liste des utilisateurs</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>

                        <?php
                        $sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
                        $stmt = $db->prepare($sql);
                        $stmt->bindValue(':identifiant', $_SESSION['user']);
                        $stmt->execute();
                        $user = $stmt->fetch();

                        if ($user['role'] = 'admin') {
                            echo '<th>Modifier</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['identifiant'] ?></td>
                            <td><?= $user['prenom'] ?></td>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['email'] ?></td>

                            <?php
                            $user_id = $user['identifiant'];

                            $sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
                            $stmt = $db->prepare($sql);
                            $stmt->bindValue(':identifiant', $_SESSION['user']);
                            $stmt->execute();
                            $user = $stmt->fetch();

                            if ($user['role'] = 'admin') {
                                echo '<td class="text-center"><a href="user/update.php?user_id=' . $user_id . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                            }
                            ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>