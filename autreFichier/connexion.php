<?php
function obtenirConnexionBD()
{
    // Connexion à la base de données
    $host = "localhost";
    $dbname = "gestion_demande_approvisionnement";
    $username = "root";
    $password = "";

    try {

        // Création d'une instance PDO pour la connexion à la base de données
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Définir le mode d'erreur pour lancer des exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourner la connexion
        return $conn;
        
    } catch (PDOException $e) {
        // Afficher un message d'erreur en cas d'échec de la connexion
        die("Erreur lors de la récupération des données de la bdd: " . $e->getMessage());
    }
}
