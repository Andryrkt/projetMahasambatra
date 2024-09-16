<?php
session_start();

function checkAccess($allowedRoles) {

    if (!isset($_SESSION['role'])) {
        header('Location: ../../View/Login/loginForm.php');
        exit();
    }

    if (!in_array($_SESSION['role'], $allowedRoles)) {
        echo "Accès refusé.";
        exit();
    }
}
?>