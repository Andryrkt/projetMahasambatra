<?php
session_start();
include_once '../../Model/ListeDemande/listeDemApproModel.php';
$conn = obtenirConnexionBD();



if (isset($_GET['id'])) {
    $token = $_GET['id'];
    
    $users = obtenirDemParId($token);
    
    // Vérifiez si $users contient des données
    if (empty($users)) {
        echo "Aucune demande trouvée pour l'ID fourni.";
    }
    
    // Générer un token sécurisé
    $token = bin2hex(random_bytes(16));
    
    // Stocker l'association token => id dans la session
    $_SESSION['tokens'][$token] = $token;
}
?>