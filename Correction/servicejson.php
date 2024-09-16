<?php
include 'demandeApproModel.php';
if (isset($_GET['agence'])) {

  $agence = $_GET['agence'];
  $services = findService($conn, $agence);

  header('Content-Type: application/json');
  echo json_encode($services);
}