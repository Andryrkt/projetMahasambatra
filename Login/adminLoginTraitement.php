<?php
//connexion à la bdd
include '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();

    // Vérifier si l'utilisateur "RAKOTOBE Jean" existe déjà
    $adminName = "RAKOTOBE Jean";
    $stmt = $conn->prepare("SELECT COUNT(*) AS count_admin FROM admin WHERE nom_admin = ?");
    $stmt->bindValue(1, $adminName, PDO::PARAM_STR); //bindValue: valeur fixe à lier à un paramètre(liaison direct)//bindPAram:lie une variable initiale à un paramètre
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row["count_admin"] == 0) {
        // "RAKOTOBE Jean" n'existe pas encore, l'insérer dans la base de données
        $adminPass = password_hash("admin@Hff2024", PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO admin (nom_admin, password) VALUES (?, ?)");
        $stmt->bindValue(1, $adminName, PDO::PARAM_STR);
        $stmt->bindValue(2, $adminPass, PDO::PARAM_STR);
        $stmt->execute();
    }
} catch (PDOException $e) {
    // Afficher un message d'erreur si la connexion échoue ou en cas d'autre erreur
    die("Erreur : " . $e->getMessage());
}
?>


<?php
session_start();

//verification de l'authentification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminName = $_POST['nom'];
    $adminPass = $_POST['mdp'];

    $stmt = $conn->prepare("SELECT nom_admin, password FROM admin WHERE nom_admin = ?");
    $stmt->bindValue(1, $adminName, PDO::PARAM_STR);
    $stmt->execute(); // Exécuter la requête

    $row = $stmt->fetch(PDO::FETCH_ASSOC);  // Lier les résultats aux variables PHP

    if ($row) {
        if (password_verify($adminPass, $row['password'])) {

            // Authentification réussie, créer une session pour stocker l'identifiant de l'admin
            $_SESSION['nom_admin'] = $row['nom_admin'];

            // Rediriger vers la page sécurisée
            header("Location: accueil.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect";
        }
    } else {
        // Utilisateur non trouvé
        echo "Utilisateur non trouvé";
    }
}











?>