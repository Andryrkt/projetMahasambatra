<?php
include '../../autreFichier/connexion.php';

function afficherUserListe()
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM utilisateur");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $users;
}

function archiverEtSupprimerUtilisateur($id) {
    $conn = obtenirConnexionBD();

    // Archiver les données avec l'horodatage actuel
    $stmt = $conn->prepare("INSERT INTO utilisateur_archive 
        (id, nom, prenom, password, date_creation, email_adress, role, agence, service)
        SELECT id, nom, prenom, password, date_creation, email_adress, role, agence, service
        FROM utilisateur
        WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Supprimer les données de la table principale
    $stmt = $conn->prepare("DELETE FROM utilisateur WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}


