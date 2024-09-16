<?php
// // Vérifier si l'utilisateur "RAKOTOBE Jean" existe déjà
// $adminName = "RAKOTOBE Jean";
// $row = verifyAdmin($adminName);

// if ($row["count_admin"] == 0) {
//     // "RAKOTOBE Jean" n'existe pas encore, l'insérer dans la base de données
//     $adminPass = password_hash("admin@Hff2024", PASSWORD_DEFAULT);
//     $adminValue = insertAdmin($adminName, $adminPass);
// }

// //verification de l'authentification
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $adminName = $_POST['nom'];
//     $adminPass = $_POST['mdp'];

// $row = obtenirAdmin($adminName);

// if ($row) {
//     if (password_verify($adminPass, $row['password'])) {

//         // Authentification réussie, créer une session pour stocker l'identifiant de l'admin
//         $_SESSION['nom_admin'] = $row['nom_admin'];

//         // Rediriger vers la page sécurisée
//         header("Location: ../accueil/accueil.php");
//         exit();
//     } else {
//         // Mot de passe incorrect
//         echo "Mot de passe incorrect";
//     }
// } else {
//     // Utilisateur non trouvé
//     echo "Utilisateur non trouvé";
// }



// // Vérifier si l'utilisateur "RAKOTOBE Jean" existe déjà
// function verifyAdmin($adminName)
// {
//     $conn = obtenirConnexionBD();

//     $stmt = $conn->prepare("SELECT COUNT(*) AS count_admin FROM admin WHERE nom_admin = ?");
//     $stmt->bindValue(1, $adminName, PDO::PARAM_STR); //bindValue: valeur fixe à lier à un paramètre(liaison direct)//bindPAram:lier une variable initiale à un paramètre
//     $stmt->execute();
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);

//     return $row;
// }

// function insertAdmin($adminName, $adminPass)
// {
//     $conn = obtenirConnexionBD();

//     $adminPass = password_hash("admin@Hff2024", PASSWORD_DEFAULT);
//     $stmt = $conn->prepare("INSERT INTO admin (nom_admin, password) VALUES (?, ?)");
//     $stmt->bindValue(1, $adminName, PDO::PARAM_STR);
//     $stmt->bindValue(2, $adminPass, PDO::PARAM_STR);
//     $stmt->execute();
// }

// function obtenirAdmin($adminName)
// {
//     $conn = obtenirConnexionBD();


//     $stmt = $conn->prepare("SELECT nom_admin, password FROM admin WHERE nom_admin = ?");
//     $stmt->bindValue(1, $adminName, PDO::PARAM_STR);
//     $stmt->execute();
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);

//     return $row;
// }