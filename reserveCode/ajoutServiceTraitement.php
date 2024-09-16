<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
  $conn = obtenirConnexionBD();
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la nouvelle catégorie depuis la requête POST
    $ajoutService =  $_POST['nouvelleService'];

    // Vérifier que le champ n'est pas vide
    if (empty($ajoutService)) {
      echo 'Le champ nouvelleService est vide.';
      exit; // Terminer le script si le champ est vide
    }

  

    // Préparer la requête SQL pour insérer la nouvelle catégorie
    $stmt = $conn->prepare('INSERT INTO service (nom) VALUES (:nom)');
    $stmt->bindParam(':nom', $ajoutService);

    // Exécuter la requête
    $stmt->execute();

    echo 'Service ajoutée avec succès.';
  }
} catch (PDOException $e) {
  // Afficher un message d'erreur si la connexion échoue ou en cas d'autre erreur
  die("Erreur : " . $e->getMessage());
}
