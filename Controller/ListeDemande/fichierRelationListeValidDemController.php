<?php
session_start();
include_once '../../Model/LoginValidateur/validateurStatDemModel.php';
// include_once '../../Model/ListeDemande/idDemandeModel.php';

$conn = obtenirConnexionBD();


    

    // Récupération des paramètres
    $id = isset($_GET['id']); // Si ID est manquant, il est null
    $validateur_id = isset($_SESSION['validateur_id']);

    if ($id && $validateur_id) {
        // Récupérer le statut actuel
        $stmt = $conn->prepare("SELECT id_statut FROM demande_appro WHERE id = ?");
        $stmt->execute([$id]);
        $current_statut = $stmt->fetchColumn();

        if ($current_statut !== false) {
            $statut_id = 0; // Initialiser à une valeur par défaut
            $action = '';

            // Déterminer le nouveau statut_id basé sur l'état actuel
            if (isset($_POST['valider'])) {
                switch ($current_statut) {
                    case 1:
                        $statut_id = 2;
                        break;
                    case 2:
                        $statut_id = 3;
                        break;
                    case 3:
                        $statut_id = 6;
                        break;
                    default:
                        echo "Statut actuel non pris en charge pour la validation.";
                        exit;
                }
                $action = 'valider';
            } elseif (isset($_POST['stock_insuffisant'])) {
                $statut_id = 4;
                $action = 'stock_insuffisant';
            } elseif (isset($_POST['annuler'])) {
                $statut_id = 7;
                $action = 'annuler';
            }

            // Assurez-vous que le statut_id est défini avant d'insérer
            if ($statut_id > 0) {
                $success = insertValueValidateurStatDem($id, $validateur_id, $statut_id);
                if ($success) {
                    echo "Action enregistrée avec succès.";
                } else {
                    echo "ID de demande, ID de validateur ou statut manquant.";              
                  }
            } 
        } 
    } else {
        echo "Méthode non autoriséehh";
    }
//afficher liste demande d'appro
include_once '../../Model/ListeDemande/listeDemApproModel.php';
$users = obtenirDemandesApprovisionnement();

//affichage du statut dans le tableau listeDemApproAffichageForm
// include_once '../statut/statutDemAffichageModel.php';
// $results = obtenirDescriptionStatutDem($user);
include_once __DIR__ .DIRECTORY_SEPARATOR.'../../Controller/Statut/statutValidationDemController.php';
// header("Location: ../../View/ListeDemande/listeDemApproAffichageForm.php");
// exit;





// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'])) {
//     $token = $_POST['token'];
//     $validateur_id = isset($_SESSION['validateur_id']) ? $_SESSION['validateur_id'] : null;

//     // Vérifier si le token est valide
//     if (isset($_SESSION['tokens'][$token])) {
//         $id = $_SESSION['tokens'][$token];
        
//         // Supprimer le token de la session après utilisation
//         unset($_SESSION['tokens'][$token]);

//         if ($validateur_id) {
//             // Récupérer le statut actuel
//             $stmt = $conn->prepare("SELECT id_statut FROM demande_appro WHERE id = ?");
//             $stmt->execute([$id]);
//             $current_statut = $stmt->fetchColumn();

//             if ($current_statut !== false) {
//                 $statut_id = 0; // Initialiser à une valeur par défaut
//                 $action = '';

//                 // Déterminer le nouveau statut_id basé sur l'état actuel
//                 if (isset($_POST['valider'])) {
//                     switch ($current_statut) {
//                         case 1:
//                             $statut_id = 2;
//                             break;
//                         case 2:
//                             $statut_id = 3;
//                             break;
//                         case 3:
//                             $statut_id = 6;
//                             break;
//                         default:
//                             echo "Statut actuel non pris en charge pour la validation.";
//                             exit;
//                     }
//                     $action = 'valider';
//                 } elseif (isset($_POST['stock_insuffisant'])) {
//                     $statut_id = 4;
//                     $action = 'stock_insuffisant';
//                 } elseif (isset($_POST['annuler'])) {
//                     $statut_id = 7;
//                     $action = 'annuler';
//                 }

//                 // Assurez-vous que le statut_id est défini avant d'insérer
//                 if ($statut_id > 0) {
//                     $success = insertValueValidateurStatDem($id, $validateur_id, $statut_id);
//                     if ($success) {
//                         echo "Action enregistrée avec succès.";
//                     } else {
//                         echo "Échec de l'enregistrement des données.";
//                     }
//                 }
//             } else {
//                 echo "Statut non trouvé.";
//             }
//         } else {
//             echo "ID de validateur non trouvé dans la session.";
//         }
//     } else {
//         echo "Token invalide.";
//     }
// } else {
//     echo "Méthode non autorisée ou token manquant.";
// }






// include_once '../Statut/statutValidationDemController.php';

// header("Location: ../../View/ListeDemande/listeDemApproAffichageForm.php");
// exit;
