<?php
include_once '../../View/Utilisateur/insertionUtilisateurForm.php';
include_once '../../Model/Utilisateur/insertionUtilisateurModel.php';
include '../../Model/Demande/demApproModel.php';

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['email']) && isset($_POST['userRole']) && isset($_POST['statut'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $userRole = $_POST['userRole'];
    $userAgence = $_POST['agence'];
    $userService = $_POST['service'];
    $validateurAgence = $_POST['agence'];
    $validateurService = $_POST['service'];

    $statutCode = $_POST['statut']; // Utilisé uniquement pour le rôle 'validateur'

    // Insertion des données dans la table correspondante
    switch ($userRole) {
        case 'utilisateur':
            insertUser($nom, $prenom, $mdp, $email, $userRole, $userAgence, $userService);
            break;
        case 'validateur':
            insertValidateur($nom, $prenom, $mdp, $statutCode, $email, $userRole, $validateurAgence, $validateurService);
            break;
        case 'admin':
            insertAdmin($nom, $prenom, $mdp, $email, $userRole);
            break;
        default:
            die("Erreur : Option non valide");
    }
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




