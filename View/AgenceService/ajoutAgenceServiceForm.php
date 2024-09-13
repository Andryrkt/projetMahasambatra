<?php
include_once '../../Controller/AgenceService/ajoutAgenceServiceController.php';
include '../../autreFichier/checkAccess.php';
checkAccess(['validateur', 'admin']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../Css/AgenceService/ajoutAgenceServiceForm.css">
</head>

<body>
  <!-- debut en-tête -->
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
<!-- fin en-tête -->


  <h2 class="text-center mt-5">Ajouter une nouvelle agence et service</h2>
  <div class="container p-5">
    <form action="../../Controller/AgenceService/ajoutAgenceServiceController.php" method="post">
      <div class="row justify-content-around">
        <div class="col-12 col-md-5 custom-col d-flex align-items-center justify-content-center p-4">
          <input class="form-control form-control-lg " type="text" name="nouvelleAgence" id="nouvelleAgence" placeholder="Entrez le nom de l'agence" required>
        </div>

        <div class="col-12 col-md-5 custom-col d-flex align-items-center justify-content-center p-4">
          <select class="form-select rounded-4" name="nouvelleService[]" id="nouvelleService" multiple>
            <option value="" disabled>choisir service</option>
            <?php foreach ($afficheService as $value) { ?>
              <option value="<?= $value['id'] ?>"><?= $value['nom'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="row margin-top">
          <div class="col-12 d-grid gap-2">
            <button name="action" type="submit" class="btn btn-dark btn-lg">Ajouter</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!-- script js -->
  <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../js/agenceService/agenceService.js"></script>

</body>
</html>