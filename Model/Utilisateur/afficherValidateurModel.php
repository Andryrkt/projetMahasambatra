<?php
include '../../autreFichier/connexion.php';

function afficherValidateurListe()
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT *FROM validateur");
$stmt->execute();
$validateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $validateurs;
}

function archiverEtSupprimerValidateur($id) {
    $conn = obtenirConnexionBD();

    // Archiver les données avec l'horodatage actuel
    $stmt = $conn->prepare("INSERT INTO validateur_archive 
        (id, nom, prenom, password, date_creation, code_statut, email_adress, role, agence, service)
        SELECT id, nom, prenom, password, date_creation, code_statut, email_adress, role, agence, service
        FROM validateur
        WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Supprimer les données de la table principale
    $stmt = $conn->prepare("DELETE FROM validateur WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
