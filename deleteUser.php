<?php
include_once 'header.php';
session_start();
// Probleme dans les tableaux, avec création de plusieurs tableaux... Probleme à cause de la boucle;

if (isset($_POST['duser'])) {
    $y = unserialize(base64_decode($_POST['duser']));
    $tab = [];
    foreach (Database::recupUser() as $user) {
        if ($y->getPseudo() !== $user->getPseudo()) {
            array_push($tab, $user);
        }
        var_dump($tab);
        $file = fopen('./users/users.bin', 'w+');
        fwrite($file, serialize($tab));
        fclose($file);
        $_SESSION = [];
        session_destroy();
    }
    echo 'le fichier n\'existe pas';
}
//header('location:index.php');
?>
<a href="index.php">Retour</a>
