<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['supprCategorie'])) //isset:verifie la clé name
    {

        //Récupérer  categorie suppr
        $categorieSuppr = $_POST['supprCategorie'];

        //Vérifier que le champ n'est pas vide
        if (empty($categorieSuppr)) {
            echo '<p>Le champ categorie est vide.</p>';
            exit; //Terminer le script si le champ est vide
        }

        //Préparer la requête SQL pour supprimer la catégorie
        $stmt = $conn->prepare('DELETE FROM categorie WHERE nom = :nom');
        $stmt->bindParam(':nom', $categorieSuppr);

        // Exécuter la requête
        $stmt->execute();

        // Vérifier le nombre de lignes affectées
        if ($stmt->rowCount() > 0) //renvoie le nombre de lignes
        {
            echo '<p>Catégorie supprimée avec succès.</p>';
        } else {
            echo '<p>Aucune catégorie trouvée avec ce nom.</p>';
        }

        // Optionnel : Récupérer à nouveau les valeurs après la suppression (mise à jour de l'affichage)
        $stmt = $conn->query('SELECT id, nom FROM categorie');
        $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo '<p>Erreur de base de données : ' . $e->getMessage() . '</p>';
    var_dump($e);
}

//"try-catch": gérer les exceptions PDO/Gestion des erreurs liées à la bdd en  php
