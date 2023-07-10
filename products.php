<?php
require_once('config/config.php');

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$sql = 'SELECT * FROM produit';
$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des produits</title>
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
                        <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="products.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php">Utilisateurs</a>
                    </li>
                </ul>
                <a class="btn btn-primary" href="logout.php">Déconnexion</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="d-flex align-items-center">
            <div class="col-6">
                <h1 class="mt-2">Liste des produits</h1>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-success" href="product/add.php">Ajouter</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Fait le</th>
                        <th>Fait à</th>
                        <th>Fait par</th>

                        <?php
                        $sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
                        $stmt = $db->prepare($sql);
                        $stmt->bindValue(':identifiant', $_SESSION['user']);
                        $stmt->execute();
                        $user = $stmt->fetch();

                        if ($user['role'] = 'admin') {
                            echo '<th>Modifier</th>';
                            echo '<th>Supprimer</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product['identifiant'] ?></td>
                            <td><?= $product['nom'] ?></td>
                            <td><?= $product['quantite'] ?></td>
                            <td><?= date_format(date_create($product['fait_le']), 'd/m/Y') ?></td>
                            <td><?= $product['fait_a'] ?></td>
                            <td>
                                <?php
                                $sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
                                $stmt = $db->prepare($sql);
                                $stmt->bindValue(':identifiant', $product['par_utilisateur']);
                                $stmt->execute();
                                $user = $stmt->fetch();
                                echo $user['prenom'];
                                ?>
                            </td>

                            <?php
                            $sql = 'SELECT * FROM utilisateur WHERE identifiant = :identifiant';
                            $stmt = $db->prepare($sql);
                            $stmt->bindValue(':identifiant', $_SESSION['user']);
                            $stmt->execute();
                            $user = $stmt->fetch();

                            if ($user['role'] = 'admin') {
                                echo '<td class="text-center"><a href="product/update.php?product_id=' . $product["identifiant"] . '"><i class="fa-solid fa-pen-to-square"></i></a></td>';
                                echo '<td class="text-center"><a href="product/delete.contr.php?product_id=' . $product["identifiant"] . '"><i class="fa-solid fa-trash text-danger"></i></a></td>';
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