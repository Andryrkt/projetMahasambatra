<?php
// include('../connexion.php');

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];

//     if (isset($_POST['valider'])) {
//         // Récupérer la valeur du bouton 
//         $bouton = $_POST['valider'];

//         // Vérifier l'état actuel de l'id statut
//         $stmt_check = $conn->prepare("SELECT id_statut FROM demande_appro WHERE id = :id");
//         $stmt_check->bindParam(':id', $id, PDO::PARAM_INT);
//         $stmt_check->execute();
//         $current_statut = $stmt_check->fetchColumn();

//         if ($current_statut == 1) {
//             // Si id_statut est 1,mettre à jour à 2
//             $stmt = $conn->prepare("UPDATE demande_appro d
//     INNER JOIN statut_demande s ON d.id_statut = s.id
//     SET d.id_statut = 2
//     WHERE d.id = :id AND d.id_statut = 1");

//             // Liaison du paramètre :id avec la valeur $id
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             // Vérifier le nombre de lignes affectées par l'UPDATE
//             $rowCount = $stmt->rowCount();
//             if ($rowCount > 0) {
//                 echo "Mise à jour id_statut 2 effectuée avec succès.";
//             } else {
//                 echo "Aucune mise à jour effectuée pour id_statut 1.";
//             }
//         } elseif ($current_statut == 2) {
//             // Si id_statut est 2,mettre à jour à 3
//             $stmt = $conn->prepare("UPDATE demande_appro d
//     INNER JOIN statut_demande s ON d.id_statut = s.id
//     SET d.id_statut = 3
//     WHERE d.id = :id AND d.id_statut = 2");

//             // Liaison du paramètre :id avec la valeur $id
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             // Vérifier le nombre de lignes affectées par l'UPDATE
//             $rowCount = $stmt->rowCount();
//             if ($rowCount > 0) {
//                 echo "Mise à jour id_statut 3 effectuée avec succès.";
//             } else {
//                 echo "Aucune mise à jour effectuée pour id_statut 2.";
//             }
//         } elseif ($current_statut == 3) {
//             // Si id_statut est 3,mettre à jour à 6
//             $stmt = $conn->prepare("UPDATE demande_appro d
//     INNER JOIN statut_demande s ON d.id_statut = s.id
//     SET d.id_statut = 6
//     WHERE d.id = :id AND d.id_statut = 3");

//             // Liaison du paramètre :id avec la valeur $id
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             // Vérifier le nombre de lignes affectées par l'UPDATE
//             $rowCount = $stmt->rowCount();
//             if ($rowCount > 0) {
//                 echo "Mise à jour id_statut 6 effectuée avec succès.";
//             } else {
//                 echo "Aucune mise à jour effectuée pour id_statut 3.";
//             }
//         } elseif ($current_statut == 4) {
//             // Si id_statut est 4,mettre à jour à 5
//             $stmt = $conn->prepare("UPDATE demande_appro d
//     INNER JOIN statut_demande s ON d.id_statut = s.id
//     SET d.id_statut = 5
//     WHERE d.id = :id AND d.id_statut = 4");

//             // Liaison du paramètre :id avec la valeur $id
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             // Vérifier le nombre de lignes affectées par l'UPDATE
//             $rowCount = $stmt->rowCount();
//             if ($rowCount > 0) {
//                 echo "Mise à jour id_statut 5 effectuée avec succès.";
//             } else {
//                 echo "Aucune mise à jour effectuée pour id_statut 4.";
//             }
//         } elseif ($current_statut == 5) {
//             // Si id_statut est 5,mettre à jour à 6
//             $stmt = $conn->prepare("UPDATE demande_appro d
//     INNER JOIN statut_demande s ON d.id_statut = s.id
//     SET d.id_statut = 6
//     WHERE d.id = :id AND d.id_statut = 5");

//             // Liaison du paramètre :id avec la valeur $id
//             $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//             $stmt->execute();

//             // Vérifier le nombre de lignes affectées par l'UPDATE
//             $rowCount = $stmt->rowCount();
//             if ($rowCount > 0) {
//                 echo "Mise à jour id_statut 5 effectuée avec succès.";
//             } else {
//                 echo "Aucune mise à jour effectuée pour id_statut 4.";
//             }
//         }
//     } else {
//         $stmt = $conn->prepare("SELECT d.id_statut FROM demande_appro d
// INNER JOIN statut_demande s ON d.id_statut = s.id
// WHERE d.id_statut = 1");

//         $stmt->execute();
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);

//         if ($result !== false) {
//             $id_statut = $result['id_statut'];
//             echo "id_statut actuel : " . $id_statut;
//         } else {
//             echo "Aucun résultat trouvé pour id_statut = 1.";
//         }
//     }
// } else {
//     echo "id introuvé";
// }
$conn = obtenirConnexionBD();

    // Vérification si l'ID est passé dans l'URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification de la présence du bouton 'valider'
            if (isset($_POST['valider'])) {

                // Récupérer la valeur du bouton
                $bouton = $_POST['valider'];

                // Vérifier l'état actuel de l'id statut
                $stmt_check = $conn->prepare("SELECT id_statut FROM demande_appro WHERE id = :id");
                $stmt_check->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt_check->execute();
                $current_statut = $stmt_check->fetchColumn();

                //assurer que l'ID est valide et existe dans la base de données.
                if ($current_statut === false) {
                    echo "Aucun statut trouvé pour cet ID.";
                    exit;
                }

                // Définir les mises à jour possibles(tableau)
                $statut_updates = [
                    1 => 2,
                    2 => 3,
                    3 => 6,
                    4 => 5,
                    5 => 6
                ];

                if (array_key_exists($current_statut, $statut_updates)) {
                    $new_statut = $statut_updates[$current_statut];



                    $stmt = $conn->prepare("UPDATE demande_appro SET id_statut = :new_statut WHERE id = :id AND id_statut = :current_statut");
                    $stmt->bindParam(':new_statut', $new_statut, PDO::PARAM_INT);
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->bindParam(':current_statut', $current_statut, PDO::PARAM_INT);
                    $stmt->execute();

                    // Vérifier le nombre de lignes affectées par l'UPDATE
                    $rowCount = $stmt->rowCount();
                    if ($rowCount > 0) {
                        echo "Mise à jour id_statut $new_statut effectuée avec succès.";
                    } else {
                        echo "Aucune mise à jour effectuée pour id_statut $current_statut.";
                    }
                } else {
                    echo "Statut non pris en charge pour la mise à jour.";
                }
            } else {
                // Cas où le formulaire n'a pas été soumis
                echo "Le formulaire n'a pas été soumis ou le bouton 'Valider' n'a pas été cliqué.";
            }
        } else {
            echo "ID non trouvé.";
        }
    }


