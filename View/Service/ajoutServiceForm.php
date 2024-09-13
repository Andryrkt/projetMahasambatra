<?php
include '../../autreFichier/checkAccess.php';
checkAccess(['validateur', 'admin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Css/Service/ajoutServiceForm.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning  border border-5 border-white w-75 p-4 mx-auto">
        <div class="container-fluid ">
            <div class="col-2">
                <img src="../../image/logoHFF.jpg" class="img-fluid" alt="Logo">
            </div>

            <div class="header bg-transparent d-flex justify-content-center gap-4">
                <!-- demande d'approvisionnement -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        Demande d'approvisionnement
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Demande/demApproForm.php">Nouvelle demande</a></li>
                        <li><a class="dropdown-item" href="../ListeDemande/listeDemApproAffichageForm.php">Liste de demande</a></li>
                </div>

                <!-- Agence service -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        Agence/Service
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Service/ajoutServiceForm.php">Ajout service</a></li>
                        <li><a class="dropdown-item" href="../AgenceService/ajoutAgenceServiceForm.php">Ajout Agence/service</a></li>
                        <li><a class="dropdown-item" href="../AgenceService/afficherAgenceServListeForm.php">Liste des agences/services</a></li>
                </div>

                <!-- categorie -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Categorie/ajoutCategorieForm.php">Ajout categorie</a></li>
                        <li><a class="dropdown-item" href="../Categorie/afficherCategorieListeForm.php">Liste des Categories</a></li>
                </div>

                <!-- utilisateur -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                        Utilisateur
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Utilisateur/insertionUtilisateurForm.php">Ajout utilisateur</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherUtilisateurListeForm.php">Liste des Utilisateurs</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherValidateurListeForm.php">Liste des validateurs</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherAdminListeForm.php">Liste des administrateurs</a></li>
                </div>
    </nav>

    <!-- ici commence le contenu du formulaire -->
    <h2 class="text-center mt-5">Ajouter une nouvelle service</h2>

    <div class="container p-5 d-flex justify-content-center align-items-center">
        <form action="../../Controller/Service/ajoutServiceController.php" method="post">
            <div class="row">
                <div class="col-12 d-flex align-items-center p-5 custom-col">
                    <input class="form-control form-control-lg me-2 p-3" type="text" name="nouvelleService" id="nouvelleService" placeholder="Entrez le nom du service" required>
                    <button type="submit" class="btn btn-dark p-3 ">Ajouter</button>
                </div>
            </div>
        </form>
</body>

<script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../js/service/service.js"></script>

</html>