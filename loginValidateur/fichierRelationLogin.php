<?php
session_start();
//inclure le fichier pour le traitement des nom et mdp du validateur 
include_once 'loginValidateurTraitement.php';
include_once 'validateurStatDemTraitement.php';
// include_once('../autreFichier/connexion.php');


// Obtenir la connexion à la base de données
// try {
//     $conn = obtenirConnexionBD();
//     // Vous pouvez maintenant utiliser $conn pour vos opérations sur la base de données
// } catch (PDOException $e) {
//     // Gérer les erreurs de connexion ici
//     echo 'Échec de la connexion : ' . $e->getMessage();
//     exit;
// }
?>