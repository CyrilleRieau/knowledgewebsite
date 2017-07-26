<?php
include_once 'header.php';
use entities\User;
use entities\Post;
use entities\Comment;

if (isset($_POST['duser'])) {
    $db->deleteUser(unserialize(base64_decode($_POST['duser'])));
    
}
//header('location:index.php');
 echo 'le fichier n\'existe pas';
?>
<a href="index.php">Retour</a>