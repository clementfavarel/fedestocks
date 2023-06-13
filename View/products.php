<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des produits</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="assets/img/logo_FEDET_wo_text.png" alt="Logo FEDET" height="60">
            <a class="navbar-brand fs-1 ms-2" href="?">FEDEstocks</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?products">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?users">Utilisateurs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4">
        <h1 class="mt-2">Liste des produits</h1>
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
                            <td><?= Model::getUserFirstnameById($product['par_utilisateur']) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>