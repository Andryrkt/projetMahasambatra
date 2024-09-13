<?php
function achatDirectStatut($conn, $id)
{
    // $conn = obtenirConnexionBD();
    //Si id_statut est 3, mettre à jour à 4
    $stmt = $conn->prepare("UPDATE demande_appro d
    INNER JOIN statut_demande s ON d.id_statut = s.id
    SET d.id_statut = 5
    WHERE d.id = :id AND d.id_statut = 4");


    // Liaison du paramètre :id avec la valeur $id
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();

}
function validerStatut($conn, $id)
{
    // Appeler la fonction pour mettre à jour le statut de 5 à 6
    $stmt = $conn->prepare("UPDATE demande_appro SET id_statut = 6 WHERE id = :id AND id_statut = 5");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->rowCount();
}
?>