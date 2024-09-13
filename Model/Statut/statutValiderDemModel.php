<?php
//connexion à la bdd
// include '../autreFichier/connexion.php';
// $conn = obtenirConnexionBD();

// Vérifier l'état actuel de l'id statut
function getCurrentStatut($conn, $id){
$conn = obtenirConnexionBD();


    // Vérifier l'état actuel de l'id statut
    $stmt_check = $conn->prepare("SELECT id_statut FROM demande_appro WHERE id = :id");
    $stmt_check->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt_check->execute();
    $current_statut = $stmt_check->fetchColumn();
    return $current_statut;
}


function updateStatut($id, $current_statut)
{
    
    // Définir les mises à jour possibles
    $statut_updates = [
        1 => 2,
        2 => 3,
        3 => 6,
    ];


    if (array_key_exists($current_statut, $statut_updates)) {
        $conn = obtenirConnexionBD();

        $new_statut = $statut_updates[$current_statut];
        $stmt = $conn->prepare("UPDATE demande_appro SET id_statut = :new_statut WHERE id = :id AND id_statut = :current_statut");
        $stmt->bindParam(':new_statut', $new_statut, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':current_statut', $current_statut, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount(); // Nombre de lignes affectées
    }
    return 0;
}

// Nouvelle fonction pour mettre à jour le statut de 5 à 6
function updateStatutTo6($id)
{
    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("UPDATE demande_appro SET id_statut = 6 WHERE id = :id AND id_statut = 5");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount(); // Nombre de lignes affectées
}
?>