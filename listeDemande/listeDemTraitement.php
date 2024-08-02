<?php
//connexion à la bdd
// include '../autreFichier/connexion.php';

//     $conn = obtenirConnexionBD();

//     $stmt = $conn->prepare("SELECT * FROM demande_appro");
//     $stmt->execute();
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC); //récuperation result



// Inclure le fichier contenant la fonction et la connexion à la base de données
include_once '../fonction/recupValue.php';

// Appeler la fonction pour obtenir les demandes d'approvisionnement
$users = obtenirDemandesApprovisionnement();
