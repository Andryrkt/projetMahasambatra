<?php
include_once '../../autreFichier/connexion.php';

function obtenirDemParId($id){
    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("SELECT *FROM demande_appro WHERE id = '" . $id . "'");
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
?>