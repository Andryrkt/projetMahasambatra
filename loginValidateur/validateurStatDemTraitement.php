<?php
// session_start();
// include_once '../autreFichier/connexion.php';

// try {
//     $conn = obtenirConnexionBD();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Récupération des paramètres
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null; //si id est manquant, il est null
        $validateur_id = isset($_SESSION['validateur_id']) ? $_SESSION['validateur_id'] : null;
        $statut_id = 0;
        $action = '';

        if (isset($_POST['valider'])) {
            $statut_id = 2;
            $statut_id = 3;
            $statut_id = 5;
            $statut_id = 6;
            $action = 'valider';
        } elseif (isset($_POST['stock_insuffisant'])) {
            $statut_id = 4;
            $action = 'stock_insuffisant';
        } elseif (isset($_POST['annuler'])) {
            $statut_id = 7;
            $action = 'annuler';
        }

        if ($id && $validateur_id) {
            //insertion dans la table
            // $stmt = $conn->prepare("INSERT INTO validateur_stat_dem (demande_id, validateur_id, statut_id) VALUES (:demande_id, :validateur_id, :statut_id) ");
            // $stmt->bindParam(':demande_id', $id, PDO::PARAM_INT);
            // $stmt->bindParam(':validateur_id', $validateur_id, PDO::PARAM_INT);
            // $stmt->bindParam(':statut_id', $statut_id, PDO::PARAM_INT);
            // $stmt->execute();
            include_once '../fonction/recupValue.php';
            $valueValidateur = insertValueValidateurStatDem($id, $validateur_id, $validateurPass);


            // Vérification de l'insertion
        //     if ($stmt->rowCount() > 0) {
        //         echo "Action '$action' enregistrée avec succès.";
        //     } else {
        //         echo "Erreur lors de l'enregistrement de l'action.";
        //     }
        } else {
            echo "ID de demande ou ID de validateur manquant.";
        }
    } else {
        echo "Méthode non autorisée.";
    }
// } catch (PDOException $e) {
//     // Afficher un message d'erreur si la connexion échoue ou en cas d'autre erreur
//     die("Erreur : " . $e->getMessage());
// }
