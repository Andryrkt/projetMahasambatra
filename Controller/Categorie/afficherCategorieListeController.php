<?php
include_once '../../Model/Categorie/afficherCategorieListeModel.php';
$conn = obtenirConnexionBD();

$categories =  afficherCategorieListe();