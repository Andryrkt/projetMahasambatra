<?php
include('../connexion.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

if (isset($_POST['valider'])) {
// Récupérer la valeur du bouton valider
    $bouton = $_POST['valider'];
   

    $stmt = $conn->prepare("UPDATE demande_appro d
 INNER JOIN statut_demande s ON d.id_statut = s.id
 SET d.id_statut = 2
 WHERE d.id = :id AND d.id_statut = 1");

   // Liaison du paramètre :id avec la valeur $id
   $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Vérifier le nombre de lignes affectées par l'UPDATE
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        echo "Mise à jour effectuée avec succès.";
    } else {
        echo "Aucune mise à jour effectuée.";
    }
} 

else {
    $stmt = $conn->prepare("SELECT d.id_statut FROM demande_appro d
INNER JOIN statut_demande s ON d.id_statut = s.id
WHERE d.id_statut = 1");

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result !== false) {
    $id_statut = $result['id_statut'];
    echo "id_statut actuel : " . $id_statut;
} else {
    echo "Aucun résultat trouvé pour id_statut = 1.";
}
}
}else{
    echo"id introuvé";
}

?>