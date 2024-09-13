<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Css/Accueil/accueil.css">
</head>

<body>
    <div class="background-container">
        <div class="background-image"></div>
        <div class="header bg-transparent d-flex justify-content-center gap-4">
            <!-- demande d'approvisionnement -->
            <div class="btn-group">
                <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    Demande d'approvisionnement
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../Demande/demApproForm.php">Nouvelle demande</a></li>
                    <li><a class="dropdown-item" href="../ListeDemande/listeDemApproAffichageForm.php">Liste de demande</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </div>

            <!-- Agence service -->
            <div class="btn-group">
                <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    Agence/Service
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../Service/ajoutServiceForm.php">Ajout service</a></li>
                    <li><a class="dropdown-item" href="../AgenceService/ajoutAgenceServiceForm.php">Ajout Agence/service</a></li>
                    <li><a class="dropdown-item" href="../AgenceService/afficherAgenceServListeForm.php">Liste des agences/services</a></li>
            </div>

            <!-- categorie -->
            <div class="btn-group">
                <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../Categorie/ajoutCategorieForm.php">Ajout categorie</a></li>
                    <li><a class="dropdown-item" href="../Categorie/afficherCategorieListeForm.php">Liste des Categories</a></li>
            </div>

            <!-- utilisateur -->
            <div class="btn-group">
                <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                    Utilisateur
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../Utilisateur/insertionUtilisateurForm.php">Ajout utilisateur</a></li>
                    <li><a class="dropdown-item" href="../Utilisateur/afficherUtilisateurListeForm.php">Liste des Utilisateurs</a></li>
                    <li><a class="dropdown-item" href="../Utilisateur/afficherValidateurListeForm.php">Liste des validateurs</a></li>
                    <li><a class="dropdown-item" href="../Utilisateur/afficherAdminListeForm.php">Liste des administrateurs</a></li>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center max-vh-100">
        <div class="box">
            <h1 class="text-white fs-1">Welcome to Hff</h1>
        </div>
        </div>
       
    </div>
    <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>