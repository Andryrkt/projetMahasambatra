<?php
include '../../Model/Demande/annulerDemandeModel.php';
$conn = obtenirConnexionBD();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'annuler') {
        $idDemande = intval($_POST['id_demande']);
        
        if ($idDemande > 0) {
            $result = annulerDemande($idDemande);

            if ($result) {
                header('Location: /path/to/your/page.php?message=Enregistrement annulé avec succès.');
                exit();
            } else {
                echo 'Erreur lors de l\'annulation de l\'enregistrement.';
            }
        } else {
            echo 'ID d\'enregistrement invalide.';
        }
    } else {
        // Traitement du formulaire normal ici, par exemple pour enregistrer l'enregistrement
    }
}

