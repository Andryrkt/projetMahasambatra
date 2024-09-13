<?php
//connexion à la bdd
// include '../autreFichier/connexion.php';

function approStockStatut($conn, $id)
{
    // $conn = obtenirConnexionBD();
    //Si id_statut est 3, mettre à jour à 4
    $stmt = $conn->prepare("UPDATE demande_appro d
    INNER JOIN statut_demande s ON d.id_statut = s.id
    SET d.id_statut = 4
    WHERE d.id = :id AND d.id_statut = 3");


    // Liaison du paramètre :id avec la valeur $id
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();

}
