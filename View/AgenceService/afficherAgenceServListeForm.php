<?php
include_once '../../Controller/AgenceService/afficherAgenceServListeController.php';
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
    <link rel="stylesheet" href="../../Css/AgenceService/afficherAgenceServListeForm.css">
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


    <h2 class="text-center mt-5">Liste Agence et Service</h2>

    <div class="container d-flex justify-content-center">
        <table class="table w-75 mt-5 text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="p-4">ID</th>
                    <th scope="col" class="p-4">Id Agence</th>
                    <th scope="col" class="p-4">Nom Agence</th>
                    <th scope="col" class="p-4">Id Service</th>
                    <th scope="col" class="p-4">Nom Service</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($groupedData as $agence): ?>
                    <tr>
                        <th scope="row" class="p-4"><?php echo htmlspecialchars($agence['id']); ?></th>
                        <td class="p-4"><?php echo htmlspecialchars($agence['agence_id']); ?></td>
                        <td class="p-4"><?php echo htmlspecialchars($agence['agence_nom']); ?></td>
                        <td class="p-4">
                            <!-- Services list -->
                            <?php
                            // Afficher les services associés à l'agence
                            $serviceList = array_map(function ($service) {
                                return htmlspecialchars($service['service_id']);
                            }, $agence['services']);
                            echo implode('<br>', $serviceList);
                            ?>
                        </td>
                        <td class="p-4">
                            <?php
                            // Afficher les noms des services associés à l'agence
                            $serviceNames = array_map(function ($service) {
                                return htmlspecialchars($service['service_nom']);
                            }, $agence['services']);
                            echo implode('<br>', $serviceNames);
                            ?>
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