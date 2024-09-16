<?php
include_once 'idDemandeController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/bootstrap-5.3.3-dist/css/bootstrap.min.css" />

</head>

<body>
 <!-- En-tête avec la section d'introduction et la barre de navigation -->
 <header>
        <!-- Section d'introduction -->
        <div class="bg-white py-1 text-center">
            <h1 class="lead mt-2 ">DEMANDE D'APPRO</h1>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg bg-warning rounded-top-4 border border-5 border-white w-75 mt-3 p-3 mx-auto">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">Logo HFF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor04" aria-controls="navbarColor04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor04">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- champ du liste de demande à valider  -->
 <div class="container">
    <h1>Demande à valider</h1>
    <form action="fichierRelationListeValidDemController.php?id=<?php echo $_GET['id']; ?> " method="post">

        <label for="nom">Demandeur</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($user['utilisateur']); ?>" disabled>
        <label for="agence">Agence</label>
        <input type="text" name="agence" id="agence" value="<?php echo htmlspecialchars($user['agence']); ?>" disabled>
        <label for="service">Service</label>
        <input type="text" name="service" id="service" value="<?php echo htmlspecialchars($user['service']); ?>" disabled>
        <label for="dateHeure">DateHeureDem</label>
        <input type="text" name="date" id="date" value="<?php echo htmlspecialchars($user['date_heure_demande']); ?>" disabled>
        <label for="date">Date Fin Souhaité</label>
        <input type="text" name="date" id="date" value="<?php echo htmlspecialchars($user['date_fin_souhaite']); ?>" disabled>
        <label for="typeDem">Type demande</label>
        <input type="text" name="typeDem" id="typeDem" value="<?php echo htmlspecialchars($user['type_demande']); ?>" disabled>
        <label for="entretientEquip">Entretient équipement</label>
        <input type="text" name="entretientEquip" id="entretientEquip" value="<?php echo htmlspecialchars($user['entretient_equip']); ?>" disabled>
        <label for="categorie">Categorie</label>
        <input type="text" name="categorie" id="categorie" value="<?php echo htmlspecialchars($user['categorie']); ?>" disabled>
        <label for="objet">Objet</label>
        <input type="text" name="objet" id="objet" value="<?php echo htmlspecialchars($user['objet']); ?>" disabled>
        <label for="detail">Detail</label>
        <input type="text" name="detail" id="detail" value="<?php echo htmlspecialchars($user['detail']); ?>" disabled>
        <label for="validateur">Validateur</label>
        <input type="text" name="validateur" value="" disabled>
        <br><br>
        <button type="submit" name="action" value="valider">Valider</button>
        <button class="btn-stock-insuffisant" type="submit" name="action" value="stock_insuffisant">
            Signaler Stock Insuffisant
        </button>
        <button class="btn-achat" type="submit" name="action" value="achat">
            Achat Direct
        </button>
        <button type="submit" name="action" value="annuler">Annuler</button>

    </form>
    </div>
</body>

</html>
