<?php
//Paramètre de connexion à la bdd MySQL
$host = 'localhost';//adress du serveur MySQL
$dbname = 'gestion_demande_approvisionnement';
$username = 'root';
$password = '';

// Options PDO pour gérer les exceptions et les erreurs
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//Activer les exeptions PDO 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,// Récupérer les résultats sous forme de tableau associatif
    PDO::ATTR_EMULATE_PREPARES => false,// Désactiver la préparation émulée
];

// Tentative(essai) de connexion à la base de données avec PDO
try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
        

} catch (PDOException $e) {
    die("Erreur : Impossible de se connecter à la base de données: " . $e->getMessage());
}



?>