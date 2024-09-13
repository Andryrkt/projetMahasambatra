<?php

function obtenirValidateur($id)
{
$conn = obtenirConnexionBD();

$stmt = $conn->prepare("SELECT * FROM validateur WHERE id = ?");
$stmt->execute([$id]);
$validateurs = $stmt->fetch(PDO::FETCH_ASSOC);

return $validateurs;
}

function modifyValidateur($nom, $prenom, $password, $code_statut, $agence, $service, $email_adress, $id)
{ 
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE validateur SET nom = ?, prenom = ?, password = ?, code_statut = ?, agence = ?, service = ?, email_adress = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $password, $code_statut, $agence, $service, $email_adress, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function modifyValidateurNoPassword($nom, $prenom, $code_statut, $agence, $service, $email_adress, $id)
{
    $conn = obtenirConnexionBD();

    $stmt = $conn->prepare("UPDATE validateur SET nom = ?, prenom = ?, code_statut = ?, agence = ?, service = ?, email_adress = ? WHERE id = ?");
    $stmt->execute([$nom, $prenom, $code_statut, $agence, $service, $email_adress, $id]);
    $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>

