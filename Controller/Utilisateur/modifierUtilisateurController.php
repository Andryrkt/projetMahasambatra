<?php
include_once '../../Model/Utilisateur/modifierUtilisateurModel.php';
include '../../Model/Demande/demApproModel.php';



if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les détails de l'utilisateur
    $users = obtenirUser($id);

    if (!$users) {
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
    $agence = $_POST['agence'];
    $service = $_POST['service'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if ($password !== '' || $confirm_password !== '') {
        if ($password !== $confirm_password) {
            die('Les mots de passe ne correspondent pas');
        }

        // Hacher le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT);


        // Mettre à jour les détails de l'utilisateur
        $modifyUsers = modifyUser($nom, $prenom, $password, $email_adress, $agence, $service, $id);
    } else {
        $modifyUsersNoPass = modifyUserNoPassword($nom, $prenom, $email_adress, $agence, $service, $id);
    }


    header('Location: ../../View/Utilisateur/afficherUtilisateurListeForm.php'); // Redirection vers la liste des utilisateurs
    exit;
}


// Obtenir les agences et les services par agence
$agences = afficherAgence($conn);
$servicesByAgence = afficherService($conn, $agences);

// Convertir les services par agence en JSON
$servicesByAgenceJson = json_encode($servicesByAgence);

//obtenir les categories
$categories = afficherCategorie($conn);
?>
<script>
    // Variables JavaScript à partir des données PHP
    var servicesByAgence = <?php echo $servicesByAgenceJson; ?>;
</script>
