<?php
 //connexion à la bdd
include_once '../../autreFichier/connexion.php';

// insértion id-demande, id-statut et id-validateur dans la table validateur-stat-dem
function insertValueValidateurStatDem($id, $validateur_id, $statut_id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("INSERT INTO validateur_stat_dem (demande_id, validateur_id, statut_id) VALUES (:demande_id, :validateur_id, :statut_id) ");
    $stmt->bindParam(':demande_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':validateur_id', $validateur_id, PDO::PARAM_INT);
    $stmt->bindParam(':statut_id', $statut_id, PDO::PARAM_INT);
    $stmt->execute();
}
?>