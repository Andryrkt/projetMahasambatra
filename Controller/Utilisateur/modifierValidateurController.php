<?php
include_once '../../Model/Utilisateur/modifierValidateurModel.php';
include '../../Model/Demande/demApproModel.php';



// Vérifier si l'ID est fourni
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer les détails de l'utilisateur
    $validateur = obtenirValidateur($id);

    if (!$validateur) {
        die('Utilisateur non trouvé');
    }
} else {
    die('ID non fourni');
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $code_statut = $_POST['code_statut'];
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
        modifyValidateur($nom, $prenom, $password, $code_statut, $agence, $service, $email_adress, $id);
    } else {
        modifyValidateurNoPassword($nom, $prenom, $code_statut, $agence, $service, $email_adress, $id);
    }

    header('Location: ../../View/Utilisateur/afficherValidateurListeForm.php'); // Redirection vers la liste des utilisateurs
    exit;
}

// Définir les options disponibles et la valeur sélectionnée après avoir récupéré le validateur
$options = [
    "A APPROUVER" => "APPROUV",
    "STOCK" => "ENCOURS APPR",
    "ACHAT DIRECT" => "ENCOURS ACHAT"
];



$selectedValue = htmlspecialchars($validateur['code_statut']);

// Préparer les options sans l'option sélectionnée
$filteredOptions = array_filter($options, function($value) use ($selectedValue) {
    return $value !== $selectedValue;
});

// Convertir les options filtrées en HTML
$htmlOptions = '';
foreach ($filteredOptions as $value => $label) {
    $htmlOptions .= "<option value=\"" . htmlspecialchars($value) . "\">" . htmlspecialchars($label) . "</option>\n";
}




// Obtenir les agences et les services par agence
$agences = afficherAgence($conn);
$servicesByAgence = afficherService($conn, $agences);

// Convertir les services par agence en JSON
$servicesByAgenceJson = json_encode($servicesByAgence);

//obtenir les categories
$categories = afficherCategorie($conn);
?>

