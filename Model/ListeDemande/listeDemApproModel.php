<?php
include_once '../../autreFichier/connexion.php';

// function obtenirDemParId($token) {
//     $conn = obtenirConnexionBD();
//     $stmt = $conn->prepare("SELECT * FROM demande_appro WHERE token = ?");
//     $stmt->execute([$token]);
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $users; 
// }
function obtenirDemandesApprovisionnement()
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT * FROM demande_appro");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function archiverEtSupprimer($id) {
    $conn = obtenirConnexionBD();

    // Archiver les données avec l'horodatage actuel
    $stmt = $conn->prepare("INSERT INTO demande_appro_archive 
        (id, agence, service, utilisateur, date_heure_demande, date_fin_souhaite, type_demande, entretient_equip, categorie, objet, fichier1, detail, id_statut)
        SELECT id, agence, service, utilisateur, date_heure_demande, date_fin_souhaite, type_demande, entretient_equip, categorie, objet, fichier1, detail, id_statut
        FROM demande_appro
        WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Supprimer les données de la table principale
    $stmt = $conn->prepare("DELETE FROM demande_appro WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}


