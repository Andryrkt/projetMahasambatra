<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nouvelleCategorie'])) //isset:verifie la clé name
    {
        // Récupérer la nouvelle catégorie depuis la requête POST
        $nouvelleCategorie = $_POST["nouvelleCategorie"];

        //Vérifier que le champ n'est pas vide
        if (empty($nouvelleCategorie)) {
            echo "<p>Le champ categorie est vide.</p>";
            exit; //Terminer le script si le champ est vide
        }



        // Préparer la requête SQL pour insérer la nouvelle catégorie
        $stmt = $conn->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        $stmt->bindParam(':nom', $nouvelleCategorie);

        // Exécuter la requête
        $stmt->execute();

        echo "Catégorie ajoutée avec succès.";
    }

    // Fermeture de la connexion PDO
    $conn = null;
} catch (PDOException $e) {
    die("Erreur lors de l'ajout de la catégorie: " . $e->getMessage());
}
