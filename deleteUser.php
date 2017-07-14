<?php
include_once 'header.php';
// Probleme : illegal offset...

if (isset($_POST['duser'])) {
    $y = unserialize(base64_decode($_POST['duser']));
    $users = Database::recupUser();
    var_dump($users);
    foreach ($users as $user) {
        if ($y->getPseudo() == $user->getPseudo()) {
            unset($users[$user]);
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
     var_dump(Database::recupUser());
}
 
//header('location:index.php');
?>
<a href="index.php">Retour</a>