<?php

include '../../Model/Statut/statutValiderDemModel.php';
include '../../Model/Statut/statutAnnulerDemModel.php';
include '../../Model/Statut/statutApproStockModel.php';
include '../../Model/Statut/statutAchatDirectModel.php';

// Vérification si l'ID est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Vérification de la méthode de la requête
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Vérification de la présence du bouton 'action'
        if (isset($_GET['action'])) {
            $action = $_GET['action']; // Obtenir l'action depuis le formulaire
            $current_statut = getCurrentStatut($conn, $id);

            // Assurer que l'ID est valide et existe dans la base de données
            if ($current_statut !== false) {
                switch ($action) {
                    case 'valider':
                        // Mise à jour basée sur l'état actuel, inclure la mise à jour de 5 à 6
                        if ($current_statut == 5) {
                            $rowCount = updateStatutTo6($id);
                            echo $rowCount > 0 ? "Mise à jour id_statut de 5 à 6 effectuée avec succès." : "Aucune mise à jour effectuée pour id_statut 5.";
                        } else {
                            $rowCount = updateStatut($id, $current_statut);
                            echo $rowCount > 0 ? "Mise à jour id_statut effectuée avec succès." : "Aucune mise à jour effectuée pour id_statut $current_statut.";
                        }
                        break;

                    case 'annuler':
                        $rowCount = annulerStatut($conn, $id);
                        echo $rowCount > 0 ? "Demande annulée avec succès." : "Aucune demande annulée effectuée.";
                        break;

                    case 'stock_insuffisant':
                        $rowCount = approStockStatut($conn, $id);
                        echo $rowCount > 0 ? "Mise à jour id_statut 4 effectuée avec succès." : "Aucune mise à jour effectuée pour id_statut 4.";
                        break;

                    case 'achat':
                        $affectedRows = achatDirectStatut($conn, $id);
                        echo $affectedRows > 0 ? "Mise à jour id_statut 5 effectuée avec succès." : "Aucune mise à jour effectuée pour id_statut 5.";
                        break;

                    default:
                        echo "Action non prise en charge.";
                        break;
                }
            } else {
                echo "Aucun statut trouvé pour cet ID.";
            }
        } else {
            echo "Aucune action spécifiée.";
        }
    } else {
        echo "Méthode non autorisée.";
    }
} else {
    echo "ID non trouvé.";
}




