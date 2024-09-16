<?php
include_once '../../Model/Utilisateur/afficherValidateurModel.php';
$conn = obtenirConnexionBD();

$validateurs =  afficherValidateurListe();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn_delete']) && isset($_POST['id'])) {
        $id = intval($_POST['id']);
        // echo "ID reçu: " . $id; 
        archiverEtSupprimerValidateur($id);
    } else {
        echo "ID non spécifié ou formulaire non soumis."; 
    }
}



