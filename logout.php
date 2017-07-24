<?php
session_start();
//Création du logout
include_once 'header.php';


if (isset($_SESSION['utilisateur'])){
    $_SESSION = [];
    session_destroy();
    header('location:index.php');
}

?>