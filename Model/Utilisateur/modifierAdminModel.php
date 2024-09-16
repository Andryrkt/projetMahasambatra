<?php

function obtenirAdmin($id)
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->execute([$id]);
$admins = $stmt->fetch(PDO::FETCH_ASSOC);

return $admins;
}

function modifyAdmin($nom, $prenom, $password, $email_adress, $id)
{ 
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE validateur SET nom = ?, prenom = ?, password = ?, email_adress = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $password, $email_adress, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function modifyAdminNoPassword($nom, $prenom, $email_adress, $id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE validateur SET nom = ?, prenom = ?, email_adress = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $email_adress, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>

