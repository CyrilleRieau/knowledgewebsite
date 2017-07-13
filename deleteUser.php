<?php
include_once 'header.php';
session_start();

if (isset($_POST['duser'])) {
    $y = unserialize(base64_decode($_POST['duser']));
    var_dump($y);
    foreach (Database::recupUser() as $user) {
        if ($y->getPseudo() !== $user->getPseudo()) {
            echo 'lol';
            unlink($y); //trouver méthode qui supprime l'objet; Genre faire un tableau des valeurs précédentes, dans le style modif
            //$_SESSION = [];
            //session_destroy();
        }
    } 
        echo 'le fichier n\'existe pas';
    
}
//header('location:index.php');
?>
<a href="index.php">Retour</a>
