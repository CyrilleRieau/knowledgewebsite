<?php
include_once 'header.php';

if (isset($_POST['fpost'])) {
    //var_dump($_POST['fpost']);
    $y = unserialize(base64_decode($_POST['fpost']));
    //var_dump($y);
    $d = $y->getDate();
    //var_dump($d);
    if (is_file('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s'))) . '.bin') {
        unlink('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin');
        echo 'vous avez bien supprimé le fichier';
    } else {
        echo 'le fichier n\'existe pas';
    }
}

header('location:postliste.php');
?>
<a href="affichePost.php">Retour</a>



