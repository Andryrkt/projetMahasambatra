<?php
include_once '../../Model/Utilisateur/afficherAdminListeModel.php';
$conn = obtenirConnexionBD();

$admins =  afficherAdminListe();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_delete']) && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        // echo "ID reçu: " . $id; 
        archiverEtSupprimerAdmin($id);
    } else {
        echo "ID non spécifié ou formulaire non soumis."; 
    }
}