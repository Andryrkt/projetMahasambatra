<?php
session_start();

include '../../Model/LoginValidateur/loginValidateurModel.php';
$conn = obtenirConnexionBD();


// Vérifier si le formulaire est soumis
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token']) && isset($_POST['name']) && isset($_POST['password'])) {
//     $token = $_POST['token'];
//     $validateurName = $_POST['name'];
//     $validateurPass = $_POST['password'];

//     // Vérifier si le token est valide
//     if (isset($_SESSION['tokens'][$token])) {
//         $id = $_SESSION['tokens'][$token];

//         // Supprimer le token de la session après utilisation
//         unset($_SESSION['tokens'][$token]);

//         // Vérifier les informations du validateur
//         $row = verifyValidateur($validateurName);
//         if ($row) {
//             if (password_verify($validateurPass, $row['password'])) {
//                 // Authentification réussie
//                 $_SESSION['validateur_id'] = $row['id']; // Id stocké dans session
//                 $_SESSION['prenom'] = $row['prenom'];

//                 // Redirection après une connexion réussie
//                 header("Location: ../../View/ListeDemande/listeValidationDemForm.php?id=" . urlencode($id));
//                 exit;
//             } else {
//                 // Mot de passe incorrect
//                 echo "Mot de passe incorrect ou validateur non trouvé";
//             }
//         } else {
//             // Validateur non trouvé
//             echo "Validateur non trouvé";
//         }
//     } else {
//         // Token invalide
//         echo "Token invalide.";
//     }
//     exit;
// }


// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $token = $_POST['token'] ?? '';
//     $validateurName = $_POST['name'] ?? '';
//     $validateurPass = $_POST['password'] ?? '';

//     if ($token && $validateurName && $validateurPass) {
//         if (isset($_SESSION['tokens'][$token])) {
//             $id = $_SESSION['tokens'][$token];
//             unset($_SESSION['tokens'][$token]);

//             $row = verifyValidateur($validateurName);
//             if ($row && password_verify($validateurPass, $row['password'])) {
//                 $_SESSION['validateur_id'] = $row['id'];
//                 $_SESSION['prenom'] = $row['prenom'];

//                 // Assurez-vous que le $id est correctement transmis
//                 header("Location: ../../View/ListeDemande/listeValidationDemForm.php?id=" . urlencode($id));
//                 exit;
//             } else {
//                 echo "Mot de passe incorrect ou validateur non trouvé";
//             }
//         } else {
//             echo "Token invalide.";
//         }
//     } else {
//         echo "Données du formulaire manquantes.";
//     }
// }


// // Générer et stocker le Token si ID est présent
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $results = obtenirDemandesParId($id);

//     // Générer un token sécurisé
//     $token = bin2hex(random_bytes(32));

//     // Stocker l'association token => id dans la session
//     $_SESSION['tokens'][$token] = $id;
// } else {
//     // Gérer le cas où aucun ID n'est présent
//     echo "ID non fourni.";
//     exit;
// }


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $results = obtenirDemandesParId($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['name']) && (isset($_POST['password'])))) {
        $validateurName = $_POST['name'];
        $validateurPass = $_POST['password'];

        $row = verifyValidateur($validateurName);
        if ($row) {
            if (password_verify($validateurPass, $row['password'])) {
                // Authentification réussie
                $_SESSION['validateur_id'] = $row['id']; //Id stocké dans session
                $_SESSION['prenom'] = $row['prenom'];


                echo "Données enregistrées avec succès!";
                header("Location: ../../View/ListeDemande/listeValidationDemForm.php?id=" . urlencode($id)); // Sécuriser les paramètres dans les URL
                exit;
            } else {
                // Mot de passe incorrect
                echo "Mot de passe incorrect ou validateur non trouvé";
            }
        }
    } 
}


