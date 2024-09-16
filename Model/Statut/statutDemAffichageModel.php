<?php
function obtenirDescriptionStatutDem($user)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT s.description 
        FROM demande_appro d 
        LEFT JOIN statut_demande s ON s.id = d.id_statut
        WHERE d.id = :id");

    $stmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['description'] : null;
}



