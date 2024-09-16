<?php
include '../../autreFichier/connexion.php';

// Ajouter une agence dans la table agence
function ajoutAgence($ajoutAgence)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare('INSERT INTO agence(nom) VALUES (:nom)');
    $stmt->bindParam(':nom', $ajoutAgence);
    $stmt->execute();

    // Récupérer l'ID de l'agence insérée
    return $conn->lastInsertId();
}


// Afficher tous les services pour le formulaire
function afficheServiceToAgenceServiceForm()
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT * FROM service");
    $stmt->execute();
    $afficheService = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $afficheService;
}

// Vérifier si une agence existe déjà
function verifierAgence($ajoutAgence)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare('SELECT id FROM agence WHERE nom = ?');
    $stmt->execute([$ajoutAgence]);
    $verifierAgence = $stmt->fetch();
    return $verifierAgence;
}



// Ajouter les services associés à l'agence dans la table agence_service
function ajoutAgenceService($selectServices, $agenceId, $ajoutAgence)
{
    $conn = obtenirConnexionBD();

    $stmtServiceName = $conn->prepare('SELECT nom FROM service WHERE id = ?');

    $stmtInsert = $conn->prepare('INSERT INTO agence_service (agence_id, service_id, agence_nom, service_nom) VALUES (?, ?, ?, ?)');
    // Insérer chaque service associé à l'agence
    foreach ($selectServices as $serviceId) {
        // Obtenir le nom du service
        $stmtServiceName->execute([$serviceId]);
        $service = $stmtServiceName->fetch(PDO::FETCH_ASSOC);

          // Vérifier si le nom du service a été trouvé
          if ($service && isset($service['nom'])) {
            $serviceNom = $service['nom'];
        } else {
            $serviceNom = 'Nom du service non trouvé';
        }

        // Insérer les données dans la table agence_service
        $stmtInsert->execute([$agenceId, $serviceId, $ajoutAgence, $serviceNom]);
    }
}
