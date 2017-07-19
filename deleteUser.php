<?php
include_once 'header.php';

if (isset($_POST['duser'])) {
    $db->deleteUser($_POST['duser']);
    
}
header('location:index.php');
 echo 'le fichier n\'existe pas';
?>
<a href="index.php">Retour</a>