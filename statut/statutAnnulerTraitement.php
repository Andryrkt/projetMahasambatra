<?php

        $id = $_GET['id'];

        if (isset($_POST['annuler'])) {
            // Récupérer la valeur du bouton annuler
            $bouton = $_POST['annuler'];


            $stmt = $conn->prepare("UPDATE demande_appro d
        INNER JOIN statut_demande s ON d.id_statut = s.id
        SET d.id_statut = 7
        WHERE d.id = :id");


            // Liaison du paramètre :id avec la valeur $id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Vérifier le nombre de lignes affectées par l'UPDATE
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                echo "demande annulée avec succès.";
            } else {
                echo "Aucune demande annulée effectuée.";
            }
        }

