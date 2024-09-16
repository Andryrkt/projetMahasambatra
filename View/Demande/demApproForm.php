<?php
include '../../autreFichier/checkAccess.php';
checkAccess(['utilisateur']);

include_once '../../Controller/Demande/demApproController.php';

// Récupérer le rôle de l'utilisateur depuis la session
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande d'approvisionnement</title>
  <!-- <link rel="stylesheet" href="../../bootstrap.min1"> -->
  <link rel="stylesheet" href="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../Css/Demande/demAppro.css" />
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
        <?php if ($role === 'utilisateur') { ?>

          <!-- Demande d'approvisionnement -->
          <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownDemande" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Demande d'approvisionnement
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownDemande">
              <li><a class="dropdown-item" href="../Demande/demApproForm.php">Nouvelle demande</a></li>
              <li><a class="dropdown-item" href="../ListeDemande/listeDemApproAffichageForm.php">Liste de demande</a></li>
            </ul>
          </li>
          <?php } ?>
          <?php if ($role === 'utilisateur' || $role === 'validateur' || $role === 'admin') { ?>
          <li class="nav-item dropdown me-5">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownAgenceService" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Paramèttre
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAgenceService">
              <!-- Agence/Service -->
              <p class="bg-secondary-subtle text-center p-2">Agence/Service</p>
              <li><a class="dropdown-item" href="../Service/ajoutServiceForm.php">Ajout service</a></li>
              <li><a class="dropdown-item" href="../AgenceService/ajoutAgenceServiceForm.php">Ajout Agence/service</a></li>
              <li><a class="dropdown-item" href="../AgenceService/afficherAgenceServListeForm.php">Liste des agences/services</a></li>

              <!-- Categorie -->
              <p class="bg-secondary-subtle text-center p-2">Agence/Service</p>
              <li><a class="dropdown-item" href="../Categorie/ajoutCategorieForm.php">Ajout categorie</a></li>
              <li><a class="dropdown-item" href="../Categorie/afficherCategorieListeForm.php">Liste des Categories</a></li>

              <!-- Utilisateur -->
              <p class="bg-secondary-subtle text-center p-2">Agence/Service</p>
              <li><a class="dropdown-item" href="../Utilisateur/insertionUtilisateurForm.php">Ajout utilisateur</a></li>
              <li><a class="dropdown-item" href="../Utilisateur/afficherUtilisateurListeForm.php">Liste des Utilisateurs</a></li>
              <li><a class="dropdown-item" href="../Utilisateur/afficherValidateurListeForm.php">Liste des validateurs</a></li>
              <li><a class="dropdown-item" href="../Utilisateur/afficherAdminListeForm.php">Liste des administrateurs</a></li>
            </ul>
          </li>
          <?php } ?>

          <!-- Deconnexion -->
          <li class="nav-item">
            <form action="../../autreFichier/deconnexion.php" method="post" class="d-inline">
              <button type="submit" class="btn btn-outline-dark text-white">
                Déconnexion
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- container -->
  <div class="container bg-white mt-5 p-5 rounded-top-3">

    <h2 class="text-center">Demande d'approvisionnement</h2>
    <hr class="border border-dark border-1 opacity-25">

    <form action="../../Controller/Demande/demApproController.php" method="post" id="demandeForm" enctype="multipart/form-data">

      <!-- Champ caché pour indiquer l'action -->
      <input type="hidden" name="action" id="formAction" value="envoyer">

      <div class="row mt-5">
        <div class="col-12 col-md-6 text-center mb-3 mb-md-0">
          <h3>Emetteur</h3>
        </div>
        <div class="col-12 col-md-6 text-center">
          <h3>Debiteur</h3>
        </div>
      </div>

      <!-- Champ agence -->
      <div class="row mt-5 mb-3">
        <label for="agence" class="mb-2 fs-5">Agence</label>
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <input class="form-control form-control-lg bg-white border border-0   p-3" id="agenceInput" type="text" placeholder="" value="<?= htmlspecialchars($agence) ?>" disabled>
        </div>
        <div class="col-12 col-md-6">
          <select class="form-select form-select-lg bg-white text-primary-emphasis border border-0 shadow p-3" name="agence" id="agenceSelect" required>
            <option selected value="">------Choisir Agence------</option>
            <?php foreach ($agences as $value) { ?>
              <option value="<?= $value['nom'] ?>"><?= $value['nom'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <!-- Service -->
      <div class="row mt-4 mb-3">
        <label for="service" class="mb-2 fs-5">Service</label>
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <input class="form-control form-control-lg bg-white border border-0 p-3" id="serviceInput" type="text" placeholder="" value="<?= htmlspecialchars($service) ?>" disabled>
        </div>
        <div class="col-12 col-md-6">
          <select class="form-select form-select-lg bg-white text-primary-emphasis p-3 border border-0 shadow" name="service" id="serviceSelect" onchange="updateService()" required>
            <option selected value="">------Choisir Service------</option>
          </select>
        </div>
      </div>

      <!-- Nom -->
      <div class="row mt-4 mb-3">
        <label for="nom" class="mb-2 fs-5">Nom</label>
        <div class="col-12">
          <input class="form-control form-control-lg bg-white border border-0 p-3" id="nomInput" type="text" name="nom" required>
        </div>
      </div>

      <!-- Date fin souhaitée -->
      <div class="row mt-4 mb-3">
        <label for="end_date" class="mb-2 fs-5">Fin souhaitée</label>
        <div class="col-12">
          <input class="form-control form-control-lg bg-white border border-0 p-3" type="date" id="end_date" name="end_date" required>
        </div>
      </div>

      <!-- Devis et achat -->
      <div class="row mt-4 mb-3">
        <label for="type_demande" class="mb-2 fs-5">Devis/Achat</label>
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <input class="form-check-input" type="checkbox" id="devisInput" name="type_demande[]" value="devis">
          <label class="form-check-label" for="devisInput">Devis</label>
        </div>
        <div class="col-12 col-md-6">
          <input class="form-check-input" type="checkbox" id="achatInput" name="type_demande[]" value="achat">
          <label class="form-check-label" for="achatInput">Achat</label>
        </div>
      </div>

      <!-- Entretien véhicule/matériel -->
      <div class="row mt-4 mb-3">
        <label for="equipement" class="mb-2 fs-5">Entretien Véhicule/Matériel</label>
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <input class="form-check-input" type="checkbox" id="ouiInput" name="equipement[]" value="oui">
          <label class="form-check-label" for="ouiInput">Oui</label>
        </div>
        <div class="col-12 col-md-6">
          <input class="form-check-input" type="checkbox" id="nonInput" name="equipement[]" value="non">
          <label class="form-check-label" for="nonInput">Non</label>
        </div>
      </div>

      <!-- Catégorie -->
      <div class="row mt-4 mb-3">
        <label for="categorie" class="mb-2 fs-5">Catégorie</label>
        <div class="col-12">
          <select class="form-select form-select-lg mb-3 bg-white text-primary-emphasis border border-0 shadow p-3" name="categorie" id="categorieSelect" required>
            <option selected value="">------Choisir catégorie------</option>
            <?php foreach ($categories as $value) { ?>
              <option value="<?= $value['nom'] ?>"><?= $value['nom'] ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <!-- Objet -->
      <div class="row mt-4 mb-3">
        <label for="objet" class="mb-2 fs-5">Objet</label>
        <div class="col-12">
          <input class="form-control form-control-lg mb-3 bg-white border border-0 p-3" id="objetInput" type="text" name="objet" onblur="capitalizeFirstLetter()" required>
        </div>
      </div>

      <!-- Fichier -->
      <div class="row mt-4 mb-3">
        <label for="fileInput" class="form-label mb-2 fs-5">Choisissez des fichiers</label>
        <div class="col-12">
          <input type="file" class="form-control bg-white border border-0 p-3" id="fileInput" name="fichiers[]" multiple required>
          <div class="form-text">Vous pouvez sélectionner plusieurs fichiers en même temps.</div>
        </div>
      </div>

      <!-- Détail -->
      <div class="row mt-4 mb-3">
        <div class="form-floating col-12">
          <textarea class="form-control form-control-lg mb-3 bg-white border border-0" id="floatingTextarea2" name="detail" style="height: 100px" onblur="capitalizeFirstLetter()" required></textarea>
          <label for="floatingTextarea2">Détail</label>
        </div>
      </div>

      <!-- Envoyer -->
      <div class="row mt-5">
        <div class="col-12 d-flex justify-content-end">
          <button type="button" class="btn btn-dark p-2 text-white fs-5 me-2" id="annulerDemandeButton">Annuler</button>
          <button type="submit" class="btn btn-warning p-2 text-white fs-5">Envoyer</button>
        </div>
      </div>
    </form>

    <?php if ($message): ?>
      <div class="alert alert-secondary border-0 mt-5" role="alert">
      <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- script -->
  <script>
    // Variables JavaScript à partir des données PHP
    var servicesByAgence = <?php echo $servicesByAgenceJson; ?>;
  </script>
  <script src="../../js/Demande/demAppro.js"></script>
  <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>