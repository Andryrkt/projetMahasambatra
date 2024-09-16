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
               
                    <a href="../../Controller/ListeDemande/fichierRelationListeValidDemController.php?id=<?= $user['id'] ?>&action=valider" class="btn btn-warning" >Valider</a>
                    <a  href="../../Controller/ListeDemande/fichierRelationListeValidDemController.php?id=<?= $user['id'] ?>&action=stock_insuffisant" class="btn btn-warning"  >Signaler Stock Insuffisant</a>
                    <a  href="../../Controller/ListeDemande/fichierRelationListeValidDemController.php?id=<?= $user['id'] ?>&action=achat" class="btn btn-dark">Achat Direct</a>
                    <a   href="../../Controller/ListeDemande/fichierRelationListeValidDemController.php?id=<?= $user['id'] ?>&action=annuler" class="btn btn-outline-warning">Annuler</a>
                </div>
            </form>
        </div>

        <!-- js -->
        <script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>