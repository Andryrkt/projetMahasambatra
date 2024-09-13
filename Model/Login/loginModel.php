<?php
include '../../autreFichier/connexion.php';

function obtenirUtilisateur($userName)
{
    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE prenom = ?");
    $stmt->bindValue(1, $userName, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function obtenirAdmin($userName) 
{
    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("SELECT * FROM admin WHERE prenom = ?");
    $stmt->bindValue(1, $userName, PDO::PARAM_STR); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function obtenirValidateur($userName) 
{
    $conn = obtenirConnexionBD();
    $stmt = $conn->prepare("SELECT * FROM validateur WHERE prenom = ?");
    $stmt->bindValue(1, $userName, PDO::PARAM_STR); 
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
