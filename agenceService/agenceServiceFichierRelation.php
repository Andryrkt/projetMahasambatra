<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    if (isset($_POST['nouvelleAgence']) && isset($_POST['nouvelleService'])) {
        $nouvelleAgence = $_POST['nouvelleAgence'];
        $selectServices = $_POST['nouvelleService'];
    }

    // Vérifie si sevices est un tableau
    // if (is_array($selectServices)){
    //     $selectServices = implode(',', $selectServices);// Transforme le tableau en chaîne
    // } 

    include '../agence/ajoutAgenceTraitement.php';
    include 'ajoutAgenceServiceTraitement.php';
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("");
}
