<?php
include_once '../../autreFichier/checkAccess.php';
checkAccess(['utilisateur']);
include '../../Model/Demande/demApproModel.php';

// Connexion à la base de données
$conn = obtenirConnexionBD();

// Récupérer les valeurs de l'agence et du service depuis la session
$agence = $_SESSION['agence'] ?? '';
$service = $_SESSION['service'] ?? '';

// Obtenir les agences, services et catégories
$agences = afficherAgence($conn);
$servicesByAgence = afficherService($conn, $agences);
$categories = afficherCategorie($conn);

// Convertir les services par agence en JSON pour le frontend
$servicesByAgenceJson = json_encode($servicesByAgence);

// Afficher le message de confirmation si disponible
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']); // Effacer le message après affichage

// Traitement POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'envoyer') {
        // Assainir et valider les données
        $data = [
            'agence' => $_POST['agence'] ?? '',
            'service' => $_POST['service'] ?? '',
            'nom' => $_POST['nom'] ?? '',
            'date_fin' => $_POST['end_date'] ?? '',
            'type_demande' => $_POST['type_demande'] ?? '',
            'equipement' => $_POST['equipement'] ?? '',
            'categorie' => $_POST['categorie'] ?? '',
            'objet' => $_POST['objet'] ?? '',
            'detail' => $_POST['detail'] ?? '',
            'fichier' => '' // Placeholder pour les fichiers
        ];

        // Générer un token unique
        $token = bin2hex(random_bytes(16)); // 32 caractères hexadécimaux 
        $data['token'] = $token;

        // Traitement des fichiers téléchargés
        $uploadedFiles = [];
        if (isset($_FILES['fichiers']) && is_array($_FILES['fichiers']['tmp_name'])) {
            foreach ($_FILES['fichiers']['tmp_name'] as $key => $tmpName) {
                $fichierOriginal = basename($_FILES['fichiers']['name'][$key]);
                $targetDir = "../../uploads/";

                $timestamp = time();
                $uniqueFileName = $timestamp . "_" . $fichierOriginal;

                if (move_uploaded_file($tmpName, $targetDir . $uniqueFileName)) {
                    $uploadedFiles[] = $uniqueFileName;
                } else {
                    throw new Exception("Erreur lors du téléchargement de : $fichierOriginal");
                }
            }

            if (!empty($uploadedFiles)) {
                $data['fichier'] = implode(',', $uploadedFiles);
            }
        }

        // Insertion dans la base de données
        insertDemAppro($conn, $data);

        // Stocker le message dans la session
        $_SESSION['message'] = 'Demande envoyée avec succès';

        // Redirection vers le formulaire avec le token
        header('Location: ../../View/Demande/demApproForm.php?token=' . urlencode($token));
        exit();
    }
}

// Traitement GET
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $action = $_GET['action'] ?? '';
    $token = $_GET['token'] ?? '';

    if ($action === 'annuler' && !empty($token)) {
        // Annuler la demande
        annulerDemande($conn, $token);

        // Stocker le message dans la session
        $_SESSION['message'] = 'Demande annulée avec succès';

        // Redirection après annulation
        header('Location: ../../View/Demande/demApproForm.php?token=' . urlencode($token));
        exit();
    }
}
