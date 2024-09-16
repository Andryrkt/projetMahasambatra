<?php
include_once '../../View/Service/ajoutServiceForm.php';
include_once '../../Model/Service/ajoutServiceModel.php';
$conn = obtenirConnexionBD();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupérer la nouvelle catégorie depuis la requête POST
    $ajoutService =  $_POST['nouvelleService'];

    // Vérifier que le champ n'est pas vide
    if (empty($ajoutService)) {
      echo 'Le champ nouvelleService est vide.';
      exit; // Terminer le script si le champ est vide
    }else{
        // Appeler la fonction pour ajouter le service
      $ajoutService = ajoutService($ajoutService);
      echo 'Service ajoutée avec succès.';
    }
 
}