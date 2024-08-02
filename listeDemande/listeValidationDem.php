<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();
    var_dump($_GET);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $conn->prepare("SELECT *FROM demande_appro WHERE id = '" . $id . "'");
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC); //recuperation result
    }
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Demande à valider</h1>
    <form action="fichierRelationListeValidDem.php?id=<?php echo $_GET['id']; ?> " method="post">

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
        <button type="submit" name="valider" value="valider">Valider</button>
        <button class="btn-stock-insuffisant" type="submit" name="stock_insuffisant" value="stock_insuffisant">
            Signaler Stock Insuffisant
        </button>

        <button type="submit" name="annuler" value="annuler">Annuler</button>

    </form>

</body>

</html>
