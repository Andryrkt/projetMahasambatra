<?php
// include '../../autreFichier/connexion.php';

function insertUser($nom, $prenom, $mdp, $email, $userRole, $userAgence, $userService)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("INSERT INTO utilisateur (nom, prenom, password, email_adress, role, agence, service) VALUES (:nom, :prenom, :password, :email, :role, :agence, :service)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':password', $mdp);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $userRole);
    $stmt->bindParam(':agence', $userAgence);
    $stmt->bindParam(':service', $userService);
    $stmt->execute();
}

function insertValidateur($nom, $prenom, $mdp, $statutCode, $email, $userRole, $validateurAgence, $validateurService)
{
    $conn = obtenirConnexionBD();

    // Préparer la requête SQL en utilisant des paramètres liés pour éviter les erreurs
    $stmt = $conn->prepare("INSERT INTO validateur (nom, prenom, password, code_statut, email_adress, role, agence, service) VALUES (:nom, :prenom, :password, :code_statut, :email, :role, :agence, :service)");
    
    // Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':password', $mdp);
    $stmt->bindParam(':code_statut', $statutCode);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $userRole);
    $stmt->bindParam(':agence', $validateurAgence);
    $stmt->bindParam(':service', $validateurService);
 //   if ($userRole === 'validateur') {
    //     $stmt->bindParam(':code_statut', $statutCode);
    //   } 
    // Exécuter la requête
    $stmt->execute();
}
   
function insertAdmin($nom, $prenom, $mdp, $email, $userRole)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("INSERT INTO admin (nom, prenom, password, email_adress, role) VALUES (:nom, :prenom, :password, :email, :role)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':password', $mdp);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $userRole);
    $stmt->execute();
}

