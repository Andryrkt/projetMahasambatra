<?php
include '../../autreFichier/connexion.php';
function ajoutService($ajoutService)
{
   $conn = obtenirConnexionBD();

   $stmt = $conn->prepare('INSERT INTO service (nom) VALUES (:nom)');
   $stmt->bindParam(':nom', $ajoutService);
   $stmt->execute();
}

function afficherService($ajoutService)
{
   $conn = obtenirConnexionBD();

   $stmt = $conn->prepare("SELECT nom  FROM service ORDER BY nom");
   $stmt->bindParam(':nom', $ajoutService);
   $stmt->execute();
   $services = $stmt->fetchAll(PDO::FETCH_COLUMN);
   
   return $services;
}

