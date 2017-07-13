<?php
include_once 'header.php';
session_start();

if (isset($_POST['duser'])) {
    $y = unserialize(base64_decode($_POST['duser']));
    
    foreach (Database::recupUser() as $user) {
        var_dump($user);
        if ($y->getPseudo() !== $user->getPseudo()) {
            echo 'lol';
    //Database::userCreate($user));
    
            //$_SESSION = [];
            //session_destroy();
        }
    } 
        echo 'le fichier n\'existe pas';
    
}
//header('location:index.php');
?>
<a href="index.php">Retour</a>
