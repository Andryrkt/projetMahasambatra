<?php
// include_once '../../Controller/ListeDemande/idDemandeController.php';
include_once '../../Model/ListeDemande/idDemandeModel.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
$user = obtenirDemParId($id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Css/ListeDemande/listeValidationDemForm.css">
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

    <h2 class="text-center mt-5">Demande à valider</h1>

        <!-- Champ du liste de demande à valider -->
        <div class="container  p-5 w-100 rounded mt-5">
            <form action="../../Controller/ListeDemande/fichierRelationListeValidDemController.php" method="post" class="needs-validation" novalidate>
                

                        <div class="row g-3 d-flex justify-content-center">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="nom" id="nom" class="form-control custom-border custom-floating-label bg-white" value="<?php echo htmlspecialchars($user['utilisateur']); ?>" disabled>
                                    <label for="nom">Demandeur</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="agence" id="agence" class="form-control custom-border" value="<?php echo htmlspecialchars($user['agence']); ?>" disabled>
                                    <label for="agence">Agence</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="service" id="service" class="form-control custom-border bg-white" value="<?php echo htmlspecialchars($user['service']); ?>" disabled>
                                    <label for="service">Service</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="date" id="date" class="form-control custom-border" value="<?php echo htmlspecialchars($user['date_heure_demande']); ?>" disabled>
                                    <label for="date">Date Heure Demande</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="date_fin" id="date_fin" class="form-control custom-border bg-white" value="<?php echo htmlspecialchars($user['date_fin_souhaite']); ?>" disabled>
                                    <label for="date_fin">Date Fin Souhaitée</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="typeDem" id="typeDem" class="form-control custom-border" value="<?php echo htmlspecialchars($user['type_demande']); ?>" disabled>
                                    <label for="typeDem">Type Demande</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="entretientEquip" id="entretientEquip" class="form-control custom-border bg-white" value="<?php echo htmlspecialchars($user['entretient_equip']); ?>" disabled>
                                    <label for="entretientEquip">Entretien Équipement</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="categorie" id="categorie" class="form-control custom-border" value="<?php echo htmlspecialchars($user['categorie']); ?>" disabled>
                                    <label for="categorie">Catégorie</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="objet" id="objet" class="form-control custom-border bg-white" value="<?php echo htmlspecialchars($user['objet']); ?>" disabled>
                                    <label for="objet">Objet</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="form-floating mb-3">
                                    <input type="text" name="detail" id="detail" class="form-control custom-border" value="<?php echo htmlspecialchars($user['detail']); ?>" disabled>
                                    <label for="detail">Détail</label>
                                </div>
                            </div>
                        </div>

                   
                <!-- Boutons pour faire la validation -->
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                <button type="submit"class="btn btn-outline-dark" name="action" value="valider">
                    <a href="../../Controller/ListeDemande/fichierRelationListeValidDemController.php?id=<?= $user['id'] ?>">Valider</a>
                </button>
                    <button type="submit" class="btn btn-warning" name="action" value="stock_insuffisant">Signaler Stock Insuffisant</button>
                    <button type="submit" class="btn btn-dark" name="action" value="achat">Achat Direct</button>
                    <button type="submit" class="btn btn-outline-warning" name="action" value="annuler">Annuler</button>
                </div>
            </form>
        </div>

        <!-- js -->
        <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>