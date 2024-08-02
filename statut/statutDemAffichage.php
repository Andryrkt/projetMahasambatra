<?php
// $conn = obtenirConnexionBD();

//   $stmt = $conn->prepare("SELECT s.description 
// FROM demande_appro d 
// LEFT JOIN statut_demande s ON s.id = d.id_statut
// Where d.id = '" . $user['id'] . "'
// ");
//   // concatenation '".$user['id']."'
//   // Exécuter la requête
//   $stmt->execute();
//   // Récupérer le résultat sous forme de tableau associatif
//   $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   echo htmlspecialchars($results[0]['description']);



include_once '../fonction/recupValue.php';
$results = obtenirDescriptionStatutDem($user);
echo htmlspecialchars($results[0]['description']);


