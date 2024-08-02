<?php
//connexion à la bdd
include('../autreFichier/connexion.php');

try {
  $conn = obtenirConnexionBD();
  if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // Vérifier si la clé 'userRole' existe dans les données POST
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mdp']) && isset($_POST['userRole']) && isset($_POST['statut'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
      $userRole = $_POST['userRole'];
      $statutCode = $_POST['statut'];

      //inserer les donnée dans la table correspondante
      switch ($userRole) { //quelle table utiliser en fonction de la valeur de $userRole
        case 'utilisateur':
          $sql = "INSERT INTO utilisateur (nom, prenom, password) VALUES (:nom, :prenom, :password)";
          break;
        case 'validateur':
          $sql = "INSERT INTO validateur (nom, prenom, password,code_statut) VALUES (:nom, :prenom, :password, :code_statut)";
          break;
        case 'administrateur':
          $sql = "INSERT INTO admin (nom, prenom, password) VALUES (:nom, :prenom, :password)";
          break;

        default:
          // Gérer une erreur si aucune correspondance trouvée
          die("Erreur : Option non valide");
      }
      // Préparer et exécuter la requête d'insertion
      $stmt = $conn->prepare("$sql");
      $stmt->bindParam(':nom', $nom);
      $stmt->bindParam(':prenom', $prenom);
      $stmt->bindParam(':password', $mdp);
      echo "Données insérées avec succès dans la table correspondante.";


      // Insérer les données dans la table validateur si le rôle est validateur
      if ($userRole === 'validateur') {
        $stmt->bindParam(':code_statut', $statutCode);
      }

      $stmt->execute();
    } else {
      echo "Aucune option sélectionnée";
    }
  }
} catch (PDOException $e) {
  // Erreur d'exécution de la requête ou récupération des résultats
  die("");
}
