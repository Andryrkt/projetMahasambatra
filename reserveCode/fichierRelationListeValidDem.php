<?php
// Inclure les fichiers nécessaires
include_once('../loginValidateur/validateurStatDemTraitement.php');
include_once('listeDemAffichage.php');
include_once('../statut/statutDemTraitement.php');
include_once('../statut/statutAnnulerTraitement.php');
include_once('../statut/statutApproStockTraitement.php');
include_once('../autreFichier/connexion.php');

// Obtenir la connexion à la base de données
try {
    $conn = obtenirConnexionBD();
    // Vous pouvez maintenant utiliser $conn pour vos opérations sur la base de données
} catch (PDOException $e) {
    // Gérer les erreurs de connexion ici
    echo 'Échec de la connexion : ' . $e->getMessage();
    exit;
}

?>