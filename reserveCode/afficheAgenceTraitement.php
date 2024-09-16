<?php
// Connexion à la base de données
include '../autreFichier/connexion.php';

function afficherAgence(){
    $conn = obtenirConnexionBD();
    
    // Préparer la requete pour sélectionner les agences
    $stmt = $conn->prepare("SELECT nom FROM agence");
    $stmt->execute();

    $agences = [];
    while ($row = $stmt->fetch()) {
        $agences[] =$row;
    }

    return $agences;

    // // Parcourir les résultats de la requête et générer les options
    // while ($row = $stmt->fetch()) {
    //     echo "<option value=\"" . $row['nom'] . "\">" . $row['nom'] . "</option>";
    // }
}
?>