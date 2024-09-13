<?php
include_once '../../Model/AgenceService/afficherAgenceServListeModel.php';
$conn = obtenirConnexionBD();

$groupedData =  afficherAgenceServiceListe();