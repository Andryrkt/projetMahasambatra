<?php
include_once '../../autreFichier/connexion.php';
function afficherAgenceServiceListe()
{
    $conn = obtenirConnexionBD();

    // Préparer et exécuter la requête pour obtenir les données
    $stmt = $conn->prepare("SELECT * FROM agence_service");
    $stmt->execute();

    // Récupérer toutes les données
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Grouper les données par 'agence_id'
    $groupedData = [];
    foreach ($data as $item) {
        $id = $item['agence_id'];
        if (!isset($groupedData[$id])) {
            $groupedData[$id] = [
                'id' => $item['id'], // Utilisez une clé unique ou ID de l'agence
                'agence_id' => $item['agence_id'],
                'agence_nom' => $item['agence_nom'],
                'services' => []
            ];
        }
        $groupedData[$id]['services'][] = [
            'service_id' => $item['service_id'],
            'service_nom' => $item['service_nom']
        ];
    }

    return $groupedData;
}