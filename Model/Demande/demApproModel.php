<?php
//connexion à la bdd
include '../../autreFichier/connexion.php';
$conn = obtenirConnexionBD();

// traitement pour afficher les agences dans le formulaire de selection d'agence
function afficherAgence($connexion)
{

    // Préparer la requete pour sélectionner les agences
    $stmt = $connexion->prepare("SELECT id, nom FROM agence");
    $stmt->execute();

    $agences = [];
    while ($row = $stmt->fetch()) {
        $agences[] = $row;
    }

    return $agences;
}

// traitement pour afficher les services par agence dans le formulaire de selection de service
function afficherService($connexion)
{
    // Récupérer toutes les agences avec leurs services associés
    $stmt = $connexion->query("SELECT a.nom AS agence_nom, s.nom AS service_nom
     FROM agence_service AS ag
     JOIN agence AS a ON ag.agence_id = a.id
     JOIN service AS s ON ag.service_id = s.id");

    // Construire un tableau JavaScript à partir des résultats
    $servicesByAgence = [];

    // Parcours des résultats et construction du tableau
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $agence = $row['agence_nom'];
        $service = $row['service_nom'];
        if (!isset($servicesByAgence[$agence])) {
            $servicesByAgence[$agence] = [];
        }
        $servicesByAgence[$agence][] = $service;
    }
    // Retourner le tableau des services par agence
    return $servicesByAgence;
}


// traitement pour afficher les categories dans le formulaire de selection de categorie
function afficherCategorie($connexion)
{
    // Préparer la requête pour sélectionner les catégories
    $stmt = $connexion->prepare("SELECT nom FROM categorie");
    $stmt->execute(); // Exécuter la requête
    $categories = [];
    while ($row = $stmt->fetch()) {
        $categories[] = $row;
    }

    return $categories;
}

// Fonction pour insérer les données dans la base de données
function insertDemAppro($conn, $data)
{
    // Convertir les tableaux en chaînes de caractères
    $data['type_demande'] = is_array($data['type_demande']) ? implode(',', $data['type_demande']) : $data['type_demande'];
    $data['equipement'] = is_array($data['equipement']) ? implode(',', $data['equipement']) : $data['equipement'];

    // Préparation de la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO demande_appro (agence, service, utilisateur, date_fin_souhaite, type_demande, entretient_equip, categorie, objet, detail, fichier1, token) 
                            VALUES (:agence, :service, :nom, :date_fin, :type_demande, :equipement, :categorie, :objet, :detail, :fichier, :token)");

    // Exécution de la requête d'insertion
    $stmt->execute($data);
}

function afficheAgenceUser($connexion)
{
    $stmt = $connexion->prepare("SELECT agence, service FROM utilisateur");
    $stmt->execute();
}


function obtenirDemandesParId($id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("SELECT * FROM demande_appro WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function annulerDemande($conn, $token)
{
    // $id = intval($id); // Assurez-vous que l'ID est valide

    // Préparer la requête pour annuler l'enregistrement
    $stmt = $conn->prepare('DELETE FROM demande_appro WHERE token = :token');
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
}




