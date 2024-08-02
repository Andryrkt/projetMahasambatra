<?php
require_once '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    // Récuperation service
    $sql = "SELECT * FROM service";
    $stmt = $conn->prepare($sql);
    $stmt->execute();


    // Récupération des résultats sous forme de tableau associatif
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("erreur lors de l'initialisation des agences");
}
