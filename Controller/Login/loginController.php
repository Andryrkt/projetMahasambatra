<?php
session_start();
include_once '../../Model/Login/loginModel.php'; // Inclure le modèle de connexion
$conn = obtenirConnexionBD(); // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les informations du formulaire
    $userName = $_POST['nom'];
    $password = $_POST['mdp'];

    // Vérifier que les informations sont présentes
    if (empty($userName) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
        exit();
    }

    // Vérifier dans la table utilisateur
    $user = obtenirUtilisateur($userName);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['role'] = 'utilisateur';
        $_SESSION['user'] = $userName;
        $_SESSION['agence'] = $user['agence']; 
        $_SESSION['service'] = $user['service'];
        header('Location: ../../View/Accueil/accueil.php'); // Page d'accueil après connexion
        exit();
    }

    // Vérifier dans la table admin
    $admin = obtenirAdmin($userName); // Utiliser $userName ici
    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['role'] = 'admin';
        $_SESSION['user'] = $userName;       
        header('Location: ../../View/Accueil/accueil.php'); // Page d'accueil après connexion
        exit();
    }

    // Vérifier dans la table validateur
    $validateur = obtenirValidateur($userName); // Utiliser $userName ici
    if ($validateur && password_verify($password, $validateur['password'])) {
        $_SESSION['role'] = 'validateur';
        $_SESSION['user'] = $userName;
        header('Location: ../../View/Accueil/accueil.php'); // Page d'accueil après connexion
        exit();
    }
} else {
    // Si aucune correspondance trouvée
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}


// session_start();
// include_once 'loginModel.php'; // Inclure le modèle de connexion
// $conn = obtenirConnexionBD(); // Connexion à la base de données

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Récupérer les informations du formulaire
//     $userName = $_POST['nom'];
//     $password = $_POST['mdp'];

//     // Vérifier que les informations sont présentes
//     if (empty($userName) || empty($password)) {
//         echo "Veuillez remplir tous les champs.";
//         exit();
//     }

//     // Vérifier dans la table utilisateur
//     $user = obtenirUtilisateur($userName);
//     if ($user && password_verify($password, $user['password'])) {
//         $_SESSION['role'] = 'utilisateur';
//         $_SESSION['user'] = $userName;
//         header('Location: ../accueil/accueil.php');
//         exit();
//     }

//     // Vérifier dans la table admin
//     $admin = obtenirAdmin($userName);
//     if ($admin && password_verify($password, $admin['password'])) {
//         $_SESSION['role'] = 'admin';
//         $_SESSION['user'] = $userName;
//         header('Location: ../accueil/accueil.php');
//         exit();
//     }

//     // Vérifier dans la table validateur
//     $validateur = obtenirValidateur($userName);
//     if ($validateur && password_verify($password, $validateur['password'])) {
//         $_SESSION['role'] = 'validateur';
//         $_SESSION['user'] = $userName;
//         header('Location: ../accueil/accueil.php');
//         exit();
//     }

//     // Si aucune correspondance trouvée
//     echo "Nom d'utilisateur ou mot de passe incorrect.";
// }