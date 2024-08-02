<?php
// Vérification que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') //verifie le type de requête http/ici POST
{

    // Récupération des données du formulaire
    $agence = $_POST['agence'];
    $service = $_POST['service'];
    $nom = $_POST['nom'];
    $dateHeureMasque = $_POST['dateHeureMasque'];
    $date_fin_souhaite = $_POST['end_date'];
    $categorie = $_POST['categorie'];
    $objet = $_POST['objet'];
    $detail = $_POST['detail'];

    // Gestion des valeurs des boutons radio
    $type_demande = isset($_POST['type_demande']) ? $_POST['type_demande'] : '';
    $entretienEquip = isset($_POST['equipement']) && $_POST['equipement'] == 'oui' ? 'Oui' : 'Non';




    //Paramètre de connexion à la bdd MySQL
    $host = 'localhost'; //adress du serveur MySQL
    $dbname = 'gestion_demande_approvisionnement';
    $username = 'root';
    $password = '';

    // Options PDO pour gérer les exceptions et les erreurs
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Activer les exeptions PDO 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupérer les résultats sous forme de tableau associatif
        PDO::ATTR_EMULATE_PREPARES => false, // Désactiver la préparation émulée
    ];

    // Tentative(essai) de connexion à la base de données avec PDO
    try {
        // Connexion à la base de données avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);

        // Préparation de la requête SQL d'insertion
        $stmt = $pdo->prepare("INSERT INTO demande_appro (agence, service, utilisateur, date_heure_demande, date_fin_souhaite, type_demande, entretient_equip, categorie, objet, detail, fichier1) 
                              VALUES (:agence, :service, :nom, :date_heure_masque, :date_fin, :type_demande, :equipement, :categorie, :objet, :detail, :fichier)");



        foreach ($_FILES['fichier1']['tmp_name'] as $key => $tmpName) {
            // Nom et chemin du fichier
            $fichierOriginal = basename($_FILES['fichier1']['name'][$key]);
            $targetDir = "../uploads/"; // Dossier cible pour les fichiers


            // Créer un nom de fichier unique avec un timestamp
            $timestamp = time(); // Récupère le timestamp actuel
            $uniqueFileName = $timestamp . "_" . $fichierOriginal; // Exemple : 1672531200_nomFichier.ext


            // Déplacer le fichier téléchargé vers le dossier cible
            if (move_uploaded_file($tmpName, $targetDir . $uniqueFileName)) {
                // Code pour insérer dans la base de données
            } else {
                echo "Erreur lors du téléchargement de : $fichier";
            }
            var_dump($_FILES);

            // Liaison des paramètres avec les valeurs du formulaire
            $stmt->bindParam(':agence', $agence);
            $stmt->bindParam(':service', $service);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':date_heure_masque', $dateHeureMasque);
            $stmt->bindParam(':date_fin', $date_fin_souhaite);
            $stmt->bindParam(':type_demande', $type_demande);
            $stmt->bindParam(':equipement', $entretienEquip);
            $stmt->bindParam(':categorie', $categorie);
            $stmt->bindParam(':objet', $objet);
            $stmt->bindParam(':detail', $detail);
            $stmt->bindParam(':fichier', $uniqueFileName);



            // Exécution de la requête avec les données du formulaire
            $stmt->execute();
        }

        // Affichage d'un message de succès
        echo "Demande enregistrée avec succès.";
    } catch (PDOException $e) {
        die("Erreur : Impossible de se connecter à la base de données: " . $e->getMessage());
    }

    // Fermeture de la connexion PDO
    unset($pdo);
}
