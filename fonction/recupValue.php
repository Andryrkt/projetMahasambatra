<?php
include '../autreFichier/connexion.php';

function obtenirDemandesApprovisionnement()
{

    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("SELECT * FROM demande_appro");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function obtenirDescriptionStatutDem($user)
{
    // Connexion à la base de données
    $conn = obtenirConnexionBD();

    // Préparer la requête SQL avec des paramètres
    $stmt = $conn->prepare("SELECT s.description 
    FROM demande_appro d 
    LEFT JOIN statut_demande s ON s.id = d.id_statut
    Where d.id = '" . $user['id'] . "'");
    // Lier les paramètres
    // $stmt->bindParam(':id', $user, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retourner les résultats
    return $results;

}

function obtenirDemandesParId($id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT *FROM demande_appro WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function obtenirVerifyValidateur($validateurName)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT id, prenom, password FROM validateur WHERE prenom = :prenom");
    $stmt->bindValue(':prenom', $validateurName, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
    // if ($row && password_verify($validateurPass, $row['password'])) {
    //     return $row;
    // }
    // Retourne les informations du validateur si l'authentification réussit, sinon retourne null
    // return null;
}

function insertValueValidateurStatDem($id, $validateur_id, $statut_id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("INSERT INTO validateur_stat_dem (demande_id, validateur_id, statut_id) VALUES (:demande_id, :validateur_id, :statut_id) ");
    $stmt->bindParam(':demande_id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':validateur_id', $validateur_id, PDO::PARAM_INT);
    $stmt->bindParam(':statut_id', $statut_id, PDO::PARAM_INT);
    $stmt->execute();

     // Vérification de l'insertion
     if ($stmt->rowCount() > 0) {
        echo "Action enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de l'action.";
    }
}

