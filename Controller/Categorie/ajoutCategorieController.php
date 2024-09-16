<?php
include_once '../../View/Categorie/ajoutCategorieForm.php';
include_once '../../Model/Categorie/ajoutCategorieModel.php';
$conn = obtenirConnexionBD();

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['nouvelleCategorie'])) //isset:verifie la clé name
{
    $nouvelleCategorie = $_POST["nouvelleCategorie"];
    //Vérifier que le champ n'est pas vide
    if (empty($nouvelleCategorie)) {
        echo "<p>Le champ categorie est vide.</p>";
        exit; //Terminer le script si le champ est vide
    }

    $ajouterCategorie = ajoutCategorie($nouvelleCategorie);
    echo "Catégorie ajoutée avec succès.";
}
