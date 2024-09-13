<?php
include_once '../../Controller/Utilisateur/afficherValidateurController.php';
include '../../autreFichier/checkAccess.php';
checkAccess(['admin', 'utilisateur', 'validateur']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Css/Utilisateur/afficherUtilisateurListeForm.css">
</head>

<body>
     <!-- navigation bar -->
     <nav class="navbar navbar-expand-lg navbar-light bg-warning border border-5 border-white w-75 p-4 mx-auto">
        <div class="container-fluid">

            <!-- Logo -->
            <a class="navbar-brand" href="#">
                <img src="../../image/logoHFF.jpg" class="img-fluid" alt="Logo" style="max-height: 40px;">
            </a>

            <!-- Navbar Toggle for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <!-- Demande d'approvisionnement -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownDemande" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Demande d'approvisionnement
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownDemande">
                            <li><a class="dropdown-item" href="../Demande/demApproForm.php">Nouvelle demande</a></li>
                            <li><a class="dropdown-item" href="../ListeDemande/listeDemApproAffichageForm.php">Liste de demande</a></li>
                        </ul>
                    </li>

                    <!-- Agence/Service -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownAgenceService" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Agence/Service
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAgenceService">
                            <li><a class="dropdown-item" href="../Service/ajoutServiceForm.php">Ajout service</a></li>
                            <li><a class="dropdown-item" href="../AgenceService/ajoutAgenceServiceForm.php">Ajout Agence/service</a></li>
                            <li><a class="dropdown-item" href="../AgenceService/afficherAgenceServListeForm.php">Liste des agences/services</a></li>
                        </ul>
                    </li>

                    <!-- Categorie -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownCategorie" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategorie">
                            <li><a class="dropdown-item" href="../Categorie/ajoutCategorieForm.php">Ajout categorie</a></li>
                            <li><a class="dropdown-item" href="../Categorie/afficherCategorieListeForm.php">Liste des Categories</a></li>
                        </ul>
                    </li>

                    <!-- Utilisateur -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownUtilisateur" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Utilisateur
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtilisateur">
                            <li><a class="dropdown-item" href="../Utilisateur/insertionUtilisateurForm.php">Ajout utilisateur</a></li>
                            <li><a class="dropdown-item" href="../Utilisateur/afficherUtilisateurListeForm.php">Liste des Utilisateurs</a></li>
                            <li><a class="dropdown-item" href="../Utilisateur/afficherValidateurListeForm.php">Liste des validateurs</a></li>
                            <li><a class="dropdown-item" href="../Utilisateur/afficherAdminListeForm.php">Liste des administrateurs</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <h2 class="text-center mt-5">Liste des Validateurs</h1>
        <div class="container d-flex justify-content-center">
            <table class="table w-75 mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col" class="bg-secondary text-white rounded-4 p-4 align-middle">ID</th>
                        <th scope="col" class="bg-secondary text-white rounded-start  p-4 align-middle">Nom</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Prenom</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Code Statut</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Adress Email</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Agence</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Service</th>
                        <th scope="col" class="bg-secondary text-white p-4 align-middle">Date de création</th>
                        <th scope="col" class="bg-secondary text-white rounded-end p-4 align-middle">X</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($validateurs as $validateur): ?>
                        <tr>
                            <th scope="row" class="text-center align-middle rounded-5 p-4"><?php echo htmlspecialchars($validateur['id']); ?></th>
                            <td class="text-center align-middle rounded-start p-4"><?php echo htmlspecialchars($validateur['nom']); ?></td>
                            <td class="text-center align-middle p-4"><?php echo htmlspecialchars($validateur['prenom']); ?></td>
                            <td class="text-center align-middle"><?php echo htmlspecialchars($validateur['code_statut']); ?></td>
                            <td class="text-center align-middle p-4"><?php echo htmlspecialchars($validateur['email_adress']); ?></td>
                            <td class="text-center align-middle p-4"><?php echo htmlspecialchars($validateur['agence']); ?></td>
                            <td class="text-center align-middle p-4"><?php echo htmlspecialchars($validateur['service']); ?></td>
                            <td class="text-center align-middle rounded-end p-4"><?php echo htmlspecialchars($validateur['date_creation']); ?></td>
                            <td class="text-center align-middle">
                                <div class="btn-group">
                                    <button class="btn-action bg-warning rounded-3 p-2 border border-5 border-white">Action</button>
                                    <div class="action-dropdown rounded-5">
                                        <form action="" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($validateur['id']); ?>">
                                            <button type="submit" name="btn_delete" class="btn-supprimer">Supprimer</button>
                                        </form>
                                        <button class="btn-modifier">
                                            <a href="modifierValidateurForm.php?id=<?php echo htmlspecialchars($validateur['id']); ?>" class="text-decoration-none">Modifier</a>
                                        </button>
                                    </div>
                                </div>
        </div>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    </table>
    </div>

    <!-- script js -->
    <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>