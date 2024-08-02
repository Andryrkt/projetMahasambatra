<?php
require_once '../autreFichier/connexion.php';

try {
    $conn = obtenirConnexionBD();
    
$stmt = $conn->prepare("SELECT * FROM utilisateur");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);//récuperation result
} catch (PDOException $e) {
    // Erreur d'exécution de la requête ou récupération des résultats
    die("");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste Utilisateur</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
        </tr>
        <?php foreach($users as $user);?>
        <tr>
        <td><?php echo htmlspecialchars($user['nom']); ?></td>
        <td><?php echo htmlspecialchars($user['prenom']); ?></td>

        </tr>
    </table>
</body>
</html>