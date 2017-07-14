<?php
include_once 'header.php';
// Probleme : ne supprime pas le nom et impossible d'accéder à la valeur...

if (isset($_POST['duser'])) {
    $y = unserialize(base64_decode($_POST['duser']));
    $tab = [];
    
    foreach (Database::recupUser() as $user) {
        if ($y->getPseudo() == $user->getPseudo()) {
            unset(Database::recupUser() , $user);
/*                array_push($tab, $user);
              }
              var_dump($tab);
              $file = fopen('./users/users.bin', 'w+');
              fwrite($file, serialize(Database::recupUser()));
              fclose($file);
             // $_SESSION = [];
              //session_destroy();
             
        */}
    //    echo 'le fichier n\'existe pas';
    }
}
 
//header('location:index.php');
?>
<a href="index.php">Retour</a>