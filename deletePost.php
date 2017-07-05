<?php

        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        session_start();



if(isset($_POST['fpost']))  {
    //var_dump($_POST['fpost']);
    $y = unserialize(base64_decode($_POST['fpost']));
    //var_dump($y);
    $d = $y->getDate();
    //var_dump($d);
    if(is_file('./posts/'.$_SESSION['utilisateur'].'/'. ($d->format('d-m-Y H:i:s'))).'.bin') {
        unlink('./posts/'.$_SESSION['utilisateur'].'/'. ($d->format('d-m-Y H:i:s')).'.bin');
        echo 'vous avez bien supprimé le fichier';
    }else {
        echo 'le fichier n\'existe pas';
    }
}

header('location:affichePost.php');
?>
<a href="affichePost.php">Retour</a>

            

