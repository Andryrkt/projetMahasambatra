<?php
//connecter à la base de donnée
include '../autreFichier/connexion.php';

//recupère le donner dans le base de donnée, Agence et service de l'utilisateur
$conn = obtenirConnexionBD();
    
// Préparer la requete pour sélectionner les agences
function findAgence($connexion)
{
    $stmt = $connexion->prepare("SELECT id, nom FROM agence");
    $stmt->execute();

    $agences = [];
    while ($row = $stmt->fetch()) {
        $agences[] =$row;
    }

    return $agences;
}

function findService($connexion, $agenceId): array
{
    $stmt = $connexion->query("SELECT s.nom
        FROM service s
        INNER JOIN agence_service ags ON s.id = ags.service_id
        INNER JOIN agence a ON a.id = ags.agence_id
        WHERE a.id = '". $agenceId ."'
        ");
    $stmt->execute();


    $services = [];
    while ($row = $stmt->fetch()) {
        $services[] =$row['nom'];
    }

    return $services;
}


function findCatg()
{

}










