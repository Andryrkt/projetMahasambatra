<?php
include '../../autreFichier/connexion.php';

function afficherCategorieListe()
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM categorie");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $categories;
}
