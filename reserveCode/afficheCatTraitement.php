<?php
// Obtenir la connexion à la base de données
include '../autreFichier/connexion.php';


    $conn = obtenirConnexionBD();

    // Préparer la requête pour sélectionner les catégories
    $stmt = $conn->prepare("SELECT nom FROM categorie");
    $stmt->execute(); // Exécuter la requête

    // Parcourir les résultats de la requête et générer les options
    while ($row = $stmt->fetch()) {
        echo "<option value=\"" . $row['nom'] . "\">" . $row['nom'] . "</option>";
    }

