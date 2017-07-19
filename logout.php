<?php

//Création du logout
include_once 'header.php';
session_start();

if (isset($_SESSION['utilisateur'])){
    $_SESSION = [];
    session_destroy();
    header('location:index.php');
}

?>