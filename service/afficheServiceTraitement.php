<?php
// Connexion à la base de données
//  $host = "localhost";
// $dbname = "gestion_demande_approvisionnement";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Sélection des catégories depuis la base de données
//     $stmt = $conn->query("SELECT nom FROM service");
//     while ($row = $stmt->fetch()) {
//         echo "<optgroup label=\"" . $row['0']['nom'] . "\">" ;
//         echo "<option value=\"". $row['nom'] ."\">".$row['nom']."</option>";
//     }
// } catch(PDOException $e) {
//     echo "Erreur lors de la récupération des services: " . $e->getMessage();
// } 

//connexion à la bdd
include '../autreFichier/connexion.php';


    $conn = obtenirConnexionBD();

    // Sélection des services groupés par le premier nom
    $stmt = $conn->query("SELECT nom  FROM service ORDER BY nom");
    $services = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Affichage des optgroups et options

    if (!empty($services)) {
        echo "<optgroup label=\"" . htmlspecialchars($services[0]) . "\">";

        // Le premier service dans l'optgroup
        echo "<option value=\"" . htmlspecialchars($services[0]) . "\">" . htmlspecialchars($services[0]) . "</option>";

        // Les autres services dans les options
        for ($i = 1; $i < count($services); $i++) {
            echo "<option value=\"" . htmlspecialchars($services[$i]) . "\">" . htmlspecialchars($services[$i]) . "</option>";
        }
        echo "</optgroup>";
    }

