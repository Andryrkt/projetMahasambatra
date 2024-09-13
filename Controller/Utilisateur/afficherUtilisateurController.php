<?php
include_once '../../Model/Utilisateur/afficherUtilisateurListeModel.php';
$conn = obtenirConnexionBD();

$users =  afficherUserListe();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_delete']) && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        // echo "ID reçu: " . $id; 
        archiverEtSupprimerUtilisateur($id);
    } else {
        echo "ID non spécifié ou formulaire non soumis."; 
    }
}