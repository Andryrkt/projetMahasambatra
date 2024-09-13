<?php
//connexion à la bdd
// include '../autreFichier/connexion.php';

function annulerStatut($conn, $id)
{
    // $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("UPDATE demande_appro d
    INNER JOIN statut_demande s ON d.id_statut = s.id
    SET d.id_statut = 7
    WHERE d.id = :id");

    // Liaison du paramètre :id avec la valeur $id
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}
