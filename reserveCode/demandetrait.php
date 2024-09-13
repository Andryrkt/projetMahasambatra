<?php

// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') // Vérifie le type de requête HTTP/ici POST
{
    // Récupération des données du formulaire
    $agence = $_POST['agence'];
    $service = $_POST['service'];
    $nom = $_POST['nom'];
    $date_fin_souhaite = $_POST['end_date'];
    $type_demande = isset($_POST['type_demande']) ? $_POST['type_demande'] : '';
    $entretienEquip = isset($_POST['equipement']) && $_POST['equipement'] == 'oui' ? 'Oui' : 'Non';
    $categorie = $_POST['categorie'];
    $objet = $_POST['objet'];
    $detail = $_POST['detail'];


     // Préparation de la requête d'insertion
     $stmt = $conn->prepare("INSERT INTO demande_appro (agence, service, utilisateur, date_fin_souhaite, type_demande, entretient_equip, categorie, objet, detail, fichier1) 
     VALUES (:agence, :service, :nom, :date_fin, :type_demande, :equipement, :categorie, :objet, :detail, :fichier)");

foreach ($uploadedFiles as $file) {
    // Liaison des paramètres avec les valeurs du formulaire
    $stmt->bindParam(':agence', $agence);
    $stmt->bindParam(':service', $service);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':date_fin', $date_fin_souhaite);
    $stmt->bindParam(':type_demande', $type_demande);
    $stmt->bindParam(':equipement', $entretienEquip);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':objet', $objet);
    $stmt->bindParam(':detail', $detail);
    $stmt->bindParam(':fichier', $file);

// Exécution de la requête d'insertion
    $stmt->execute();

   

    // Traitement des fichiers téléchargés
    $uploadedFiles = [];
    foreach ($_FILES['fichiers']['tmp_name'] as $key => $tmpName) {
        // Nom et chemin du fichier
        $fichierOriginal = basename($_FILES['fichiers']['name'][$key]);
        $targetDir = "../uploads/"; // Dossier cible pour les fichiers

        // Créer un nom de fichier unique avec un timestamp
        $timestamp = time(); // Récupère le timestamp actuel
        $uniqueFileName = $timestamp . "_" . $fichierOriginal; // Exemple : 1672531200_nomFichier.ext

        // Déplacer le fichier téléchargé vers le dossier cible
        if (move_uploaded_file($tmpName, $targetDir . $uniqueFileName)) {
            $uploadedFiles[] = $uniqueFileName;
        } else {
            echo "Erreur lors du téléchargement de : $fichierOriginal<br>";
        }
    }
}
}
?>