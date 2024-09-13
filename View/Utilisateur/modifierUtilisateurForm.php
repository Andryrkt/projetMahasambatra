<?php
include_once '../../Controller/Utilisateur/modifierUtilisateurController.php';
include '../../autreFichier/checkAccess.php';
checkAccess(['admin', 'validateur']);
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
    <nav class="navbar navbar-expand-lg bg-warning  border border-5 border-white w-75 p-4 mx-auto">
        <div class="container-fluid ">
            <div class="col-2">
                <img src="../../image/logoHFF.jpg" class="img-fluid" alt="Logo">
            </div>

            <div class="header bg-transparent d-flex justify-content-center gap-4">
                <!-- demande d'approvisionnement -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        Demande d'approvisionnement
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Demande/demApproForm.php">Nouvelle demande</a></li>
                        <li><a class="dropdown-item" href="../ListeDemande/listeDemApproAffichageForm.php">Liste de demande</a></li>
                </div>

                <!-- Agence service -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        Agence/Service
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Service/ajoutServiceForm.php">Ajout service</a></li>
                        <li><a class="dropdown-item" href="../AgenceService/ajoutAgenceServiceForm.php">Ajout Agence/service</a></li>
                        <li><a class="dropdown-item" href="../AgenceService/afficherAgenceServListeForm.php">Liste des agences/services</a></li>
                </div>

                <!-- categorie -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Categorie/ajoutCategorieForm.php">Ajout categorie</a></li>
                        <li><a class="dropdown-item" href="../Categorie/afficherCategorieListeForm.php">Liste des Categories</a></li>
                </div>

                <!-- utilisateur -->
                <div class="btn-group dropend">
                    <button type="button" class="btn btn-transparent btn-no-border dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        Utilisateur
                    </button>
                    <ul class="dropdown-menu my-4">
                        <li><a class="dropdown-item" href="../Utilisateur/insertionUtilisateurForm.php">Ajout utilisateur</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherUtilisateurListeForm.php">Liste des Utilisateurs</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherValidateurListeForm.php">Liste des validateurs</a></li>
                        <li><a class="dropdown-item" href="../Utilisateur/afficherAdminListeForm.php">Liste des administrateurs</a></li>
                </div>
    </nav>



    <div class="container bg-white mt-5 p-5 rounded-top-3">
        <h2 class="text-center">Modifier Utilisateur</h2>
        <hr class="border border-dark border-1 opacity-25">

        <?php foreach ($users as $user): ?>
            <form action="" method="POST">
                <div class="row d-flex justify-content-center ">
                    <div class="col-12 col-md-3 ">
                        <label for="nom" class="col-form-label mt-4 ms-4 text-info-emphasis">Nom</label>
                        <input class="form-control p-3 w-75 ms-4" type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>"><br>
                    </div>

                    <div class="col-12 col-md-3 ">
                        <label for="prenom" class="col-form-label mt-4 ms-4 text-info-emphasis">Prénom</label>
                        <input class="form-control p-3 w-75 ms-4" type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>"><br>
                    </div>
                    <div class="col-12 col-md-6 ">
                        <label for="email_adress" class="col-form-label mt-4 ms-4 text-info-emphasis">Adresse Email</label>
                        <input class="form-control p-3 w-75 ms-4" type="email" id="email_adress" name="email_adress" value="<?php echo htmlspecialchars($user['email_adress']); ?>">
                    </div>

                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-3 ">
                        <label for="agence" class="col-form-label mt-4 text-info-emphasis">Agence</label>
                        <select class="form-select p-3 w-75" name="agence" id="agenceSelect">
                            <option selected value="<?php echo htmlspecialchars($user['agence']); ?>"><?php echo htmlspecialchars($user['agence']); ?></option>
                            <?php foreach ($agences as $value) { ?>
                                <option value="<?= $value['nom'] ?>"><?= $value['nom'] ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-12 col-md-3 ">
                        <label for="service" class="col-form-label mt-4 text-info-emphasis">Service</label>
                        <select class="form-select p-3 w-75" name="service" id="serviceSelect" onchange="updateService()">
                            <option selected value="<?php echo htmlspecialchars($user['service']); ?>"><?php echo htmlspecialchars($user['service']); ?></option>
                        </select>
                    </div>


                    <div class="col-12 col-md-3 ">
                        <label for="password" class="col-form-label mt-4 text-info-emphasis">Nouveau Mot de Passe</label>
                        <input class="form-control p-3 w-75 " type="password" id="password" name="password"><br>
                    </div>

                    <div class="col-12 col-md-3 ">
                        <label for="confirm_password" class="col-form-label mt-4 text-info-emphasis">Confirmer le Mot de Passe</label>
                        <input class="form-control p-3 w-75 " type="password" id="confirm_password" name="confirm_password">
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-warning p-2 text-white fs-5">Modifier</button>
                    </div>
                </div>
    </div>




    </form>
<?php endforeach; ?>
</div>

<!-- js -->
<script src="../../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="../../js/Demande/demAppro.js"></script>

</body>

</html>

