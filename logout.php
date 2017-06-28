<?php

//Création du logout

session_start();
if (isset($_SESSION['utilisateur'])){
    $_SESSION = [];
    session_destroy();
}
header('location : index.php');
echo 'Vous êtes déconnecté.'
?>
<a href="index.php">Retour</a>