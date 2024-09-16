<?php
//connexion à la bdd
// include '../../autreFichier/connexion.php';

// Fonction pour annuler une demande
function annulerDemande($idDemande) {
    $conn = obtenirConnexionBD();
   // Préparer la requête pour annuler l'enregistrement
   $stmt = $conn->prepare('DELETE FROM demande_appro WHERE id = :id');
   $stmt->bindParam(':id', $idDemande, PDO::PARAM_INT);
}