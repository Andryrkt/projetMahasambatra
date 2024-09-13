<?php
//connexion à la bdd
include '../../autreFichier/connexion.php';

function obtenirDemandesParId($id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT * FROM demande_appro WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

// function obtenirDemandesParId($token)
// {
//     $conn = obtenirConnexionBD();

//     $stmt = $conn->prepare("SELECT * FROM demande_appro WHERE token = :token");
//     $stmt->bindParam(':token', $token, PDO::PARAM_INT);
//     $stmt->execute();
//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $results;
// }
function verifyValidateur($validateurName)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT id, prenom, password FROM validateur WHERE prenom = :prenom");
    $stmt->bindValue(':prenom', $validateurName, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
    // if ($row && password_verify($validateurPass, $row['password'])) {
    //     return $row;
    // }
    // Retourne les informations du validateur si l'authentification réussit, sinon retourne null
    // return null;
}




?>