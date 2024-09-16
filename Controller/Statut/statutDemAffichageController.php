<?php
include_once '../../Model/Statut/statutDemAffichageModel.php';

// Obtenir la description du statut
$result = obtenirDescriptionStatutDem($user);




// include_once '../../Model/Statut/statutDemAffichageModel.php';
// $result = obtenirDescriptionStatutDem($user);

// Vérifiez si $result n'est pas null avant d'afficher
// if ($result !== null) {
//     echo htmlspecialchars($result);
// } else {
//     echo "Statut non disponible."; // Message alternatif si aucune description n'est trouvée
// }
