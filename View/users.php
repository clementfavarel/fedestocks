<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Liste des utilisateurs</title>
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
                        <a class="nav-link" href="?products">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?users">Utilisateurs</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <h1 class="mt-2">Liste des utilisateurs</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['identifiant'] ?></td>
                            <td><?= $user['prenom'] ?></td>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td class="text-center"><a href="View/user/update"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td class="text-center"><a href="View/user/delete"><i class="fa-solid fa-trash text-danger"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>