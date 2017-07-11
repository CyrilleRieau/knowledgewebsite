<?php

        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        session_start();



if(isset($_POST['cpost']))  {
    //var_dump($_POST['fpost']);
    $y = unserialize(base64_decode($_POST['cpost']));
    $z = unserialize(base64_decode($_POST['comfpost']));
    //var_dump($y);
    $d = $y->getDate();
  //  var_dump($d);
    $e =$z->getDate();
//    var_dump($e);
    //var_dump($d);
    if(is_file('./comment/'.($e->format('d-m-Y H:i:s')).'/'. ($d->format('d-m-Y H:i:s'))).'.bin') {
        unlink('./comment/'.($e->format('d-m-Y H:i:s')).'/'. ($d->format('d-m-Y H:i:s')).'.bin');
        echo 'vous avez bien supprimé le fichier';
    }else {
        echo 'le fichier n\'existe pas';
    }
}

header('location:postliste.php');
?>
<a href="affichePost.php">Retour</a>

            

