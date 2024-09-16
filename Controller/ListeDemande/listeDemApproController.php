<?php
// include '../../autreFichier/checkAccess.php';
// checkAccess(['admin', 'utilisateur', 'validateur']);

// // Assurez-vous que le token est défini dans la session ou passé par l'URL
// if (isset($_SESSION['token'])) {
//     $token = $_SESSION['token'];
// } elseif (isset($_GET['token'])) {
//     $token = $_GET['token'];
//     $_SESSION['token'] = $token; // Stocke le token dans la session pour une utilisation future
// } else {
//     echo "Token non spécifié.";
//     exit;
// }


// include '../../Model/ListeDemande/listeDemApproModel.php';
// $conn = obtenirConnexionBD();

// // Afficher liste demande d'appro
// $users = obtenirDemParId($id);


include '../../Model/ListeDemande/listeDemApproModel.php';
$conn = obtenirConnexionBD();

//afficher liste demande d'appro
$users = obtenirDemandesApprovisionnement();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_delete']) && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        // echo "ID reçu: " . $id; 
        archiverEtSupprimer($id);
    } else {
        echo "ID non spécifié ou formulaire non soumis."; 
    }
}

?>