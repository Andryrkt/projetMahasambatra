<?php
include_once '../../Controller/Utilisateur/insertionUtilisateurController.php';
include '../../autreFichier/checkAccess.php';
checkAccess(['admin', 'validateur']);

// Récupérer le rôle de l'utilisateur depuis la session
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
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

    <div class="container bg-white mt-5 p-4 rounded-3">
        <h2 class="text-center mb-4">Ajout utilisateur</h2>
        <hr class="border border-dark border-1 opacity-25 mb-4">

        <form action="../../Controller/Utilisateur/insertionUtilisateurController.php" method="post">
            <div class="row mb-3 ">
                <div class="col-12 col-md-5 ">
                    <label class="form-label" for="nom">Nom</label>
                    <input class="form-control p-3" type="text" placeholder="Enter name user" name="nom" id="nom" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="agence" class="form-label">Agence</label>
                    <select class="form-select p-3" name="agence" id="agenceSelect">
                        <option selected value="">------Choisir Agence------</option>
                        <?php foreach ($agences as $value) { ?>
                            <option value="<?= htmlspecialchars($value['nom']) ?>"><?= htmlspecialchars($value['nom']) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-5">
                    <label class="form-label" for="prenom">Prénom</label>
                    <input class="form-control p-3" type="text" placeholder="Enter first name user" name="prenom" id="prenom" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="service" class="form-label">Service</label>
                    <select class="form-select p-3" name="service" id="serviceSelect" onchange="updateService()">
                        <option selected value="">------Choisir Service------</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3 ">
                <div class="col-12 col-md-5">
                    <label for="mdp" class="form-label">Mot de passe</label>
                    <input type="password p-3" class="form-control" name="mdp" id="mdp" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="userRole" class="form-label">Rôle</label>
                    <select class="form-select p-3" name="userRole" id="userRole">
                        <option selected value="">------Choisir Rôle------</option>
                        <?php if ($role === 'admin') { ?>
                            <option value="utilisateur">Utilisateur</option>
                            <option value="validateur">Validateur</option>
                            <option value="admin">Administrateur</option>
                        <?php } elseif ($role === 'validateur') { ?>
                            <option value="utilisateur">Utilisateur</option>
                            <option value="validateur">Validateur</option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3 ">
                <div class="col-12 col-md-5">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email p-4" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <div id="statutContainer" style="display: none;">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-select p-3" name="statut" id="statut">
                            <option selected value="">------Choisir statut------</option>
                            <option value="APPROUV">À APPROUVER</option>
                            <option value="ENCOURS APPR">STOCK</option>
                            <option value="ENCOURS ACHAT">ACHAT DIRECT</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning rounded-pill">Ajouter</button>
                </div>
            </div>
        </form>
    </div>


    <!-- <div class="container bg-white mt-5 p-5 rounded-top-3">
        <h2 class="text-center">Ajouter utilisateur</h2>
        <hr class="border border-dark border-1 opacity-25">

        <form action="../../Controller/Utilisateur/insertionUtilisateurController.php" method="post">
            <div class="row ">
                <div class="col-12 col-md-5 offset-md-1">
                    <label class="col-form-label col-form-label-lg mt-4" for="nom">Nom</label>
                    <input class="form-control p-3 w-75 rounded-4" type="text" placeholder="Enter name user" name="nom" id="nom" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="agence" class="col-form-label col-form-label-lg mt-4">Agence</label>
                    <select class="form-select p-3 w-75 rounded-4 " name="agence" id="agenceSelect">
                        <option selected value="">------Choose Agence------</option>
                        <?php foreach ($agences as $value) { ?>
                            <option value="<?= $value['nom'] ?>"><?= $value['nom'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-5 offset-md-1">
                    <label class="col-form-label col-form-label-lg mt-4" for="prenom">Prenom</label>
                    <input class="form-control p-3 w-75 rounded-4" type="text" placeholder="Enter firstName user" name="prenom" id="prenom" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="service" class="col-form-label col-form-label-lg mt-4">Service</label>
                    <select class="form-select p-3 w-75 rounded-4" name="service" id="serviceSelect" onchange="updateService()">
                        <option selected value="">------Choose Service------</option>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="mdp" class="col-form-label col-form-label-lg mt-4">Mot de passe</label>
                    <input type="password" class="form-control p-3 w-75 rounded-4" name="mdp" id="mdp" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                    <label for="userRole" class="col-form-label col-form-label-lg mt-4">Rôle</label>
                    <select class="form-select p-3 w-75 rounded-4" name="userRole" id="userRole">
                        <option selected value="">------Choose User Role------</option>
                        <?php if ($role === 'admin') { ?>
                            <option value="utilisateur">Utilisateur</option>
                            <option value="validateur">Validateur</option>
                            <option value="admin">Administrateur</option>
                        <?php } elseif ($role === 'validateur') { ?>
                            <option value="utilisateur">Utilisateur</option>
                            <option value="validateur">Validateur</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 col-md-5 offset-md-1">
                <label for="email" class="col-form-label col-form-label-lg mt-4">Email address</label>
                        <input type="email" class="form-control p-3 w-75 rounded-4" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="col-12 col-md-5 offset-md-1">
                <div id="statutContainer" style="display: none;" class="">
                        <label for="statut" class="col-form-label col-form-label-lg mt-4">Statut</label>
                        <select class="form-select p-3 w-75 rounded-4" name="statut" id="statut">
                            <option selected value="">------Choose statut------</option>
                            <option value="APPROUV">A APPROUVER</option>
                            <option value="ENCOURS APPR">STOCK</option>
                            <option value="ENCOURS ACHAT">ACHAT DIRECT</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-warning rounded-pill p-3">Ajouter</button>
                </div>
            </div>
        </form>
    </div> -->

    <!-- script js -->
    <script src="../../js/Utilisateur/insertUserForm.js"></script>
    <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/Demande/demAppro.js"></script>

</body>

</html>