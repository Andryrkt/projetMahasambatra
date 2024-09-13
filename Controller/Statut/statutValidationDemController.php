<?php
// // include '../../autreFichier/connexion.php';
// include '../../Model/Statut/statutValiderDemModel.php'; // Pour getCurrentStatut et updateStatut
// include '../../Model/Statut/statutAnnulerDemModel.php';
// include '../../Model/Statut/statutApproStockModel.php';
// include '../../Model/Statut/statutAchatDirectModel.php';


// // Vérifier si l'ID est passé dans l'URL
// if (isset($_GET['id']) && is_numeric($_GET['id'])) {
//     $id = intval($_GET['id']); // Assurez-vous que l'ID est un entier
    
//     // Vérifier la méthode de la requête
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // Vérifier la présence du bouton 'valider'
//         if (isset($_POST['action'])) {
//             $action = $_POST['action'];
//             $current_statut = getCurrentStatut($conn, $id);

//             if ($current_statut !== false) {
//                 // Gérer la mise à jour selon l'action
//                 switch ($action) {
//                     case 'achat':
//                         $affectedRows = achatDirectStatut($conn, $id);
//                         if ($affectedRows > 0) {
//                             echo "Mise à jour id_statut 4 à 5 effectuée avec succès.";
//                         } else {
//                             echo "Aucune mise à jour effectuée pour id_statut 4.";
//                         }
//                         break;
                    
//                     case 'valider':
//                         $affectedRows = validerStatut($conn, $id);
//                         if ($affectedRows > 0) {
//                             echo "Mise à jour id_statut 5 à 6 effectuée avec succès.";
//                         } else {
//                             echo "Aucune mise à jour effectuée pour id_statut 5.";
//                         }
//                         break;
                    
//                     // Autres actions
//                     case 'annuler':
//                         $rowCount = annulerStatut($conn, $id);
//                         echo $rowCount > 0 ? "Demande annulée avec succès." : "Aucune demande annulée effectuée.";
//                         break;
                    
//                     case 'stock_insuffisant':
//                         $rowCount = approStockStatut($conn, $id);
//                         echo $rowCount > 0 ? "Mise à jour id_statut 3 à 4 effectuée avec succès." : "Aucune mise à jour effectuée pour id_statut 3.";
//                         break;
                    
//                     default:
//                         echo "Action non reconnue.";
//                         break;
//                 }
//             } else {
//                 echo "Aucun statut trouvé pour cet ID.";
//             }
//         } else {
//             echo "Aucune action spécifiée.";
//         }
//     } else {
//         echo "Méthode de requête non autorisée.";
//     }
// } else {
//     echo "ID non trouvé ou invalide.";
// }







// include '../../Model/Statut/statutValiderDemModel.php';
// include '../../Model/Statut/statutAnnulerDemModel.php';
// include '../../Model/Statut/statutApproStockModel.php';
// include '../../Model/Statut/statutAchatDirectModel.php';
// // Vérification si l'ID est passé dans l'URL
// if (isset($_GET['id']) && is_numeric($_GET['id'])) {
//     $id = $_GET['id'];

//      // Vérification de la méthode de la requête
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         // Vérification de la présence du bouton 'valider'
//         if (isset($_POST['action'])) {
//             $current_statut = getCurrentStatut($conn, $id);

//             //assurer que l'ID est valide et existe dans la base de données.
//             if ($current_statut !== false) {
//                 $rowCount = updateStatut($id, $current_statut);

//                 if ($rowCount > 0) {
//                     echo "Mise à jour id_statut effectuée avec succès.";
//                 } else {
//                     echo "Aucune mise à jour effectuée pour id_statut $current_statut.";
//                 }
//             } else {
//                 echo "Aucun statut trouvé pour cet ID.";
//             }
//         }

// annuler statut demande
 // Vérification de la présence du bouton 'annuler'
// if (isset($_POST['annuler'])) {
//     $rowCount = annulerStatut($conn, $id);

//     // Vérifier le nombre de lignes affectées par l'UPDATE
//     if ($rowCount > 0) {
//         echo "demande annulée avec succès.";
//     } else {
//         echo "Aucune demande annulée effectuée.";
//     }
// }
// }

// //appro stock statut demande
//     if (isset($_POST['stock_insuffisant'])) {
//         $rowCount = approStockStatut($conn, $id);
//         // Vérifier le nombre de lignes affectées par l'UPDATE
//         if ($rowCount > 0) {
//             echo "Mise à jour id_statut 4 effectuée avec succès.";
//         } else {
//             echo "Aucune mise à jour effectuée pour id_statut 3.";
//         }
//     }
// else {
//     echo "Méthode non autorisée.";
// }


// //achat direct statut demande
// if ($action === 'achat') {
//     $affectedRows = achatDirectStatut($conn, $id);
//         // Vérifier le nombre de lignes affectées par l'UPDATE
//         if ($affectedRows > 0) {
//             echo "Mise à jour id_statut 5 effectuée avec succès.";
//         } else {
//             echo "Aucune mise à jour effectuée pour id_statut 4.";
//         }
//     }elseif ($action === 'valider') {
//         // Mise à jour du statut de 5 à 6
//         $affectedRows = validerStatut($conn, $id);
//         if ($affectedRows > 0) {
//             echo "Statut mis à jour de 5 à 6.";
//         } else {
//             echo "Aucune mise à jour effectuée ou le statut n'était pas 5.";
//         }
//     }

// } else {
// echo "ID non trouvé.";
// }

// ito le tena izy
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




