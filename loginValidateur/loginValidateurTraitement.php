<?php
// session_start();
// include_once '../autreFichier/connexion.php';

// $conn = obtenirConnexionBD();
var_dump($_GET);
// Vérification si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    include_once '../fonction/recupValue.php';
    $results = obtenirDemandesParId($id);
    // $stmt = $conn->prepare("SELECT *FROM demande_appro WHERE id = '" . $id . "'");
    // $stmt->execute();
    // $result = $stmt->fetch(PDO::FETCH_ASSOC);



      // $stmt = $conn->prepare("SELECT id, prenom, password FROM validateur WHERE prenom = ?");
        // $stmt->bindValue(1, $validateurName, PDO::PARAM_STR);
        // $stmt->execute();
        // if ($row) {
        //     if (password_verify($validateurPass, $row['password'])) {
        //         // Authentification réussie
        //         $_SESSION['validateur_id'] = $row['id']; //ito le //id stocké dans session
        //         $_SESSION['prenom'] = $row['prenom'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_POST['name']) && (isset($_POST['password'])))) {
        $validateurName = $_POST['name'];
        $validateurPass = $_POST['password'];
        include_once '../fonction/recupValue.php';
        $row = obtenirVerifyValidateur($validateurName, $validateurPass);
        // if ($validateur) {
        //         // Authentification réussie
        //         $_SESSION['validateur_id'] = $validateur['id'];
        //         $_SESSION['prenom'] = $validateur['prenom'];

  if ($row) {
            if (password_verify($validateurPass, $row['password'])) {
                // Authentification réussie
                $_SESSION['validateur_id'] = $row['id']; //ito le //id stocké dans session
                $_SESSION['prenom'] = $row['prenom'];


            echo "Données enregistrées avec succès!";
            header("Location: ../listeDemande/listeValidationDem.php?id=" . urlencode($id)); // Sécuriser les paramètres dans les URL
            exit;
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect";
        } 
    } else {
        // Mot de passe incorrect
        echo "Validateur non trouvé";
    } 
}

}