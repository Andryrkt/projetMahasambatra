<?php
include '../../autreFichier/checkAccess.php';
checkAccess(['validateur', 'admin']);
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
    <link rel="stylesheet" href="../../Css/Service/ajoutServiceForm.css">
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