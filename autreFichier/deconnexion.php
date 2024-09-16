<?php

// démarrer la session
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Détruire la session
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Détruire la session
session_destroy();

// Rediriger vers la page d'accueil ou la page de connexion
header("Location: ../demandeAppro.php"); // Remplacez 'index.php' par la page de destination souhaitée
exit();


?>