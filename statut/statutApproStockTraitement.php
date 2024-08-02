<?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($_POST['stock_insuffisant'])) {
            // Récupérer la valeur du bouton annuler
            $bouton = $_POST['stock_insuffisant'];


            //Si id_statut est 3, mettre à jour à 4
            $stmt = $conn->prepare("UPDATE demande_appro d
    INNER JOIN statut_demande s ON d.id_statut = s.id
    SET d.id_statut = 4
    WHERE d.id = :id AND d.id_statut = 3");


            // Liaison du paramètre :id avec la valeur $id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            // Vérifier le nombre de lignes affectées par l'UPDATE
            $rowCount = $stmt->rowCount();
            if ($rowCount > 0) {
                echo "Mise à jour id_statut 4 effectuée avec succès.";
            } else {
                echo "Aucune mise à jour effectuée pour id_statut 3.";
            }
        }
    }

