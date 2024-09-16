<?php
include_once '../../Model/Utilisateur/modifierAdminModel.php';
include '../../Model/Demande/demApproModel.php';



// Vérifier si l'ID est fourni
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les détails de l'utilisateur
    $admin = obtenirAdmin($id);

    if (!$admin) {
        die('Utilisateur non trouvé');
    }
} else {
    die('ID non fourni');
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email_adress = $_POST['email_adress'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== '' || $confirm_password !== '') {
        if ($password !== $confirm_password) {
            die('Les mots de passe ne correspondent pas');
        }

        // Hacher le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Mettre à jour les détails de l'utilisateur
        modifyAdmin($nom, $prenom, $password, $email_adress, $id);
    } else {
        modifyAdminNoPassword($nom, $prenom, $email_adress, $id);
    }

    header('Location: ../../View/Utilisateur/afficherAdminListeForm.php'); // Redirection vers la liste des utilisateurs
    exit;
}



?>

