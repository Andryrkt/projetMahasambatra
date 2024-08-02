
<?php
require_once '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    //Récuperer la nouvelle agence
    if (isset($_POST['nouvelleAgence']) && isset($_POST['nouvelleService'])) {
        $ajoutAgence = $_POST['nouvelleAgence'];
        $selectServices = $_POST['nouvelleService'];

        //verifier que l'agence existe
        $stmt = $conn->prepare('SELECT id FROM agence WHERE nom = ?');
        $stmt->execute([$ajoutAgence]);
        $agence = $stmt->fetch(); //recupère l'id de l'agence

        if ($agence) {
            $agenceId = $agence['id'];


            //Préparer la requête SQL pour insèrer la nouvelle agence
            $stmt = $conn->prepare('INSERT INTO agence_service(agence_id, service_id) VALUES (?, ?)'); //Ces paramètres seront remplacés par les valeurs passées dans execute()

            foreach ($selectServices as $serviceId) {
                $stmt->execute([$agenceId, $serviceId]);
            }

            echo "L'agence et les services ont été ajoutés avec succès.";
        } else {
            echo "L'agence spécifiée n'existe pas.";
        }
    }
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("");
}
