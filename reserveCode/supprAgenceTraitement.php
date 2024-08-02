<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['supprAgence'])) //isset:verifie la clé name
{

    //Récupérer  categorie suppr
    $agenceSuppr = $_POST['supprAgence'];

    //Vérifier que le champ n'est pas vide
    if (empty($agenceSuppr)) {
        echo '<p>Le champ agence est vide.</p>';
        exit; //Terminer le script si le champ est vide
    }

    //connexion à la bdd
    try {
        $conn = new PDO('mysql:host=localhost;dbname=gestion_demande_approvisionnement', 'root', '');

        // Options PDO pour gérer les exceptions et les erreurs
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Active le mode exception


        //Préparer la requête SQL pour supprimer la catégorie
        $stmt = $conn->prepare('DELETE FROM agence WHERE nom = :nom');
        $stmt->bindParam(':nom', $agenceSuppr);

        // Exécuter la requête
        $stmt->execute();

        // Vérifier le nombre de lignes affectées
        if ($stmt->rowCount() > 0) //renvoie le nombre de lignes
         {
            echo '<p>Agence supprimée avec succès.</p>';
        } else {
            echo '<p>Aucune agence trouvée avec ce nom.</p>';
        }

         // Optionnel : Récupérer à nouveau les valeurs après la suppression (mise à jour de l'affichage)
         $stmt = $conn->query('SELECT id, nom FROM agence');
         $valeurs = $stmt->fetchAll(PDO::FETCH_ASSOC);
         

    } catch (PDOException $e) {
        echo '<p>Erreur de base de données : ' . $e->getMessage() . '</p>';
    }
} 

//"try-catch": gérer les exceptions PDO/Gestion des erreurs liées à la bdd en  php
?>