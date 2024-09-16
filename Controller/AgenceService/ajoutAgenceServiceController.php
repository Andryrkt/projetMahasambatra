<?php
include_once '../../View/AgenceService/ajoutAgenceServiceForm.php';
include_once '../../Model/AgenceService/ajoutAgenceServiceModel.php';

$conn = obtenirConnexionBD();

// Ajouter agence service dans la table agence_service
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nouvelleAgence']) && isset($_POST['nouvelleService'])) {

    // Récupérer la nouvelle agence et les services sélectionnés
    $ajoutAgence = $_POST['nouvelleAgence'];
    $selectServices = $_POST['nouvelleService'];

    // Vérifier que le champ n'est pas vide
    if (empty($ajoutAgence)) {
        echo 'Le champ nouvelleAgence est vide.';
        exit; // Terminer le script si le champ est vide
    }

    // Ajouter l'agence et récupérer l'ID
    $agenceId = ajoutAgence($ajoutAgence);

    // Ajouter les services associés à l'agence
    ajoutAgenceService($selectServices, $agenceId, $ajoutAgence);
        echo "L'agence et les services ont été ajoutés avec succès.";
        
       
}

// Appeler la fonction pour afficher tous les services
$afficheService = afficheServiceToAgenceServiceForm();