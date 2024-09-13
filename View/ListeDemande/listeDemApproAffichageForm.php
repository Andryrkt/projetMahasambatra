<?php
// include('../../Controller/ListeDemande/listeDemApproController.php');
// $userRole = $_SESSION['role'];
include('../../Controller/ListeDemande/listeDemApproController.php');
include '../../autreFichier/checkAccess.php';
checkAccess(['admin', 'utilisateur', 'validateur']);
$userRole = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../bootstrap.min1"> -->
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Css/ListeDemande/listeDemAffichage.css">

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



    <h2 class="text-center my-5">Liste de demande d'approvisionnement</h2>
    <!-- <hr class="border border-dark border-1 opacity-25 mx-auto w-50"> -->

    <!-- Champ recherche -->
    <div class="row mt-5 mx-1">
        <div class="col-md-8">
            <form class="d-flex">
                <input id="searchInput" class="form-control me-2  w-50 p-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-secondary" type="button" onclick="filterTable()">Search</button>
            </form>
        </div>
    </div>

    <div class="row mt-2 mx-3 mt-4">
        <div class="col-md-6 col-lg-3 p-3 border border-5 border-white rounded-4">
            <fieldset>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="id" id="idInput">
                    <label class="form-check-label" for="idInput">ID</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="agence" id="agenceInput">
                    <label class="form-check-label" for="agenceInput">Agence</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="service" id="serviceInput">
                    <label class="form-check-label" for="serviceInput">Service</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="categorie" id="categorieInput">
                    <label class="form-check-label" for="categorieInput">Categorie</label>
                </div>
            </fieldset>
        </div>

        <div class="col-md-6 col-lg-3 p-3 border border-5 border-white rounded-4">
            <fieldset>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="statut" id="statutInput">
                    <label class="form-check-label" for="statutInput">Statut</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="demandeur" id="demandeurInput">
                    <label class="form-check-label" for="demandeurInput">Demandeur</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="typeDemande" id="typeDemandeInput">
                    <label class="form-check-label" for="typeDemandeInput">Type demande</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="dateDebutDemande" id="dateDebDemandeInput">
                    <label class="form-check-label" for="dateDebDemandeInput">Date debut demande</label>
                </div>
            </fieldset>
        </div>
    </div>


    <div class="row">
        <div class="col-12 d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-dark me-md-4 p-2">
                <a href="../Demande/demApproForm.php" class="text-white text-decoration-none">Nouveau</a>
            </button>
        </div>
    </div>

    <!-- Tableau des demandes -->
    <div class="table-responsive mt-4">
        <table class="table table-striped table-custom">
            <thead>
                <tr>
                    <th scope="col" class="bg-secondary text-center align-middle p-3" style="border-top-left-radius: 0.7rem;"></th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">ID</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Agence</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Service</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Demandeur</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Date/heure Dem</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">DF-Souhaité</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Type Dem</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Entretien_Equip</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Categorie</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Objet</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Piece-joint</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3">Detail</th>
                    <th scope="col" class="bg-secondary text-center align-middle text-white p-3" style="border-top-right-radius: 0.7rem;">Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td class="text-center align-middle">
                          
                            <div class="btn-group position-relative">
                                <button class="btn-action bg-warning rounded-3 p-2 border border-5 border-white" type="button">Action</button>
                                <div class="action-dropdown rounded-5 ">
                                    <?php if ($userRole === 'admin' || $userRole === 'validateur') : ?>
                                        <button class="btn-valider">
                                            <a href="../LoginValidateur/loginValidateurForm.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="list-group-item list-group-item-action">Valider</a>
                                        </button>
                                        <form action="" method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                                            <button type="submit" name="btn_delete" class="btn-supprimer">Supprimer</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['id']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['agence']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['service']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['utilisateur']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['date_heure_demande']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['date_fin_souhaite']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['type_demande']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['entretient_equip']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['categorie']); ?></td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['objet']); ?></td>
                        <td class="text-center align-middle">
                            <?php
                            // Récupérez les noms de fichiers depuis la colonne 'fichier1'
                            $fileList = htmlspecialchars($user['fichier1']);

                            // Séparez les fichiers par la virgule
                            $files = explode(',', $fileList);

                            // Parcourez chaque fichier
                            foreach ($files as $fileName) {
                                // Nettoyez le nom de fichier
                                $fileName = trim($fileName);

                                // Affichez le nom du fichier
                                echo $fileName . '<br>';

                                // Construisez le chemin du fichier
                                $filePath = '../../uploads/' . $fileName;
                                if (file_exists($filePath)) {
                                    echo '<a href="' . htmlspecialchars($filePath) . '" target="_blank">Open File</a>';
                                } else {
                                    echo 'File not found';
                                }
                                echo '<br>'; // Saut de ligne après chaque fichier
                            }
                            ?>
                        </td>
                        <td class="text-center align-middle"><?php echo htmlspecialchars($user['detail']); ?></td>
                        <td class="text-center align-middle">
                            <?php
                            include('../../Controller/Statut/statutDemAffichageController.php');
                            ?>
                            <?php if ($result === 'OUVERT'): ?>
                                <span class="bg-light text-dark p-2 rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>

                            <?php elseif ($result === 'A APPROUVER'): ?>
                                <span class="bg-success text-white p-2 rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>

                            <?php elseif ($result === 'ENCOURS APPRO STOCK'): ?>
                                <span class="bg-dark-subtle text-white  rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>

                            <?php elseif ($result === 'STOCK INSUFFISANT'): ?>
                                <span class="bg-secondary text-white rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>
                            <?php elseif ($result === 'ENCOURS ACHAT DIRECT'): ?>
                                <span class="bg-danger text-white rounded ">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>
                            <?php elseif ($result === 'LIVRER'): ?>
                                <span class="bg-warning text-white p-2 rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>
                            <?php elseif ($result === 'INCOMPLET'): ?>
                                <span class="bg-dark text-white p-2 rounded">
                                    <?php echo htmlspecialchars($result); ?>
                                </span>
                            <?php else: ?>
                                <span class="bg-light text-dark p-2 rounded">
                                    Statut non disponible.
                                </span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <!-- script js -->
    <script src="../../js/ListeDemande/listeDemAffichage.js"></script>
    <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>