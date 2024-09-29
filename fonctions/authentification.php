<?php

function est_connecte(): bool
{
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connexion']);
}

function force_utilisateur_connect()
{
    if(!est_connecte())
    {
        header('Location: /login.php');
        exit();
    }
}