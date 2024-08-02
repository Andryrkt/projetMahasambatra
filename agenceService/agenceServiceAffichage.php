<?php
// Connexion à la base de données (à adapter selon votre configuration)
include '../autreFichier/connexion.php';


    $conn = obtenirConnexionBD();
    // Récupérer toutes les agences avec leurs services associés
    $stmt = $conn->query("SELECT a.nom AS agence_nom, s.nom AS service_nom
                          FROM agence_service AS ag
                          JOIN agence AS a ON ag.agence_id = a.id
                          JOIN service AS s ON ag.service_id = s.id");

    // Construire un tableau JavaScript à partir des résultats
    $servicesByAgence = [];

    // Parcours des résultats et construction du tableau
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $agence = $row['agence_nom'];
        $service = $row['service_nom'];
        if (!isset($servicesByAgence[$agence])) {
            $servicesByAgence[$agence] = [];
        }
        $servicesByAgence[$agence][] = $service;
    }

    // Convertir en JSON
    $servicesByAgenceJson = json_encode($servicesByAgence);

    // Générer le script JavaScript directement dans la page HTML
    echo '<script>';
    echo 'var servicesByAgence = ' . $servicesByAgenceJson . ';';
    echo '</script>';
?>
