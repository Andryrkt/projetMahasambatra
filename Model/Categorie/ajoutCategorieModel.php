<?php
include '../../autreFichier/connexion.php';

function ajoutCategorie($nouvelleCategorie)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
    $stmt->bindParam(':nom', $nouvelleCategorie);
    $stmt->execute();
}


