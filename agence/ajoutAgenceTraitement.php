
<?php
//connexion à la bdd
// require '../autreFichier/connexion.php';

try {
    // $conn = obtenirConnexionBD();

    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nouvelleAgence'])) {

        //Récuperer la nouvelle agence
        $ajoutAgence = $_POST['nouvelleAgence'];

        // Vérifier que le champ n'est pas vide
        if (empty($ajoutAgence)) {
            echo 'Le champ nouvelleAgence est vide.';
            exit; // Terminer le script si le champ est vide
        }

        //Préparer la requête SQL pour ainsèrer la nouvelle agence
        $stmt = $conn->prepare('INSERT INTO agence(nom) VALUES (:nom)');
        $stmt->bindParam(':nom', $ajoutAgence);

        //Exécuter la requête
        $stmt->execute();
        echo 'Agence ajouté avec succès';
    }
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("");
}
