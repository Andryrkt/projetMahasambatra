<?php
include '../../autreFichier/connexion.php';

function afficherAdminListe()
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM admin");
$stmt->execute();
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $admins;
}

function archiverEtSupprimerAdmin($id) {
    $conn = obtenirConnexionBD();

    // Archiver les données avec l'horodatage actuel
    $stmt = $conn->prepare("INSERT INTO admin_archive 
        (id, nom, prenom, password, email_adress, role, date_creation )
        SELECT id, nom, prenom, password, email_adress, role, date_creation
        FROM admin
        WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Supprimer les données de la table principale
    $stmt = $conn->prepare("DELETE FROM admin WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
