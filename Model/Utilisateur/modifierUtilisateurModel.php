<?php

function obtenirUser($id)
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM utilisateur WHERE id = ?");
$stmt->execute([$id]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $users;
}


function modifyUser($nom, $prenom, $password, $email_adress, $agence, $service, $id)
{ 
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, password = ?, email_adress = ?, agence = ?, service = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $password, $email_adress, $agence, $service, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);


}

function modifyUserNoPassword($nom, $prenom, $email_adress, $agence, $service, $id){
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, email_adress = ?, agence = ?, service = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $email_adress, $agence, $service, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>