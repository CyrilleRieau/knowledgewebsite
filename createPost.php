<?php

session_start();

include_once 'header.php';

use entities\User;
use entities\Comment;
use entities\Post;

//$titrehid = $_POST['titrep'];
//echo $_SESSION['utilisateur'];

foreach ($db->recupUser() as $user) {
    if ($user->getPseudo() == $_SESSION['utilisateur']) {
        
//echo $titrehid;
     function createPost($user) {
            return new Post($_POST['commentp'], new DateTime(), $_SESSION['utilisateur'], $_POST['disciplinep'], $_POST['titrep'], $_POST['tagsp'], 0, 0, $user->getId());
        }

        $db->postCreate(createPost($user), $user);
       
    }
}


if (!isset($_SESSION['utilisateur']) || !isset($_POST['disciplinep']) || !isset($_POST['titrep']) || !isset($_POST['tagsp']) || !isset($_POST['commentp'])) {
    echo 'Post inexistant.';
    exit(1);
}
if ($_SESSION['utilisateur'] == "" || $_POST['disciplinep'] == "" || $_POST['titrep'] == "" || $_POST['tagsp'] == "" || $_POST['commentp'] == "") {
    echo 'Post non complet.';
    exit(1);
}
//$namepo = $_SESSION['utilisateur'];
$discipo = $_POST['disciplinep'];
//$titpo = $_POST['titrep'];
$tagpo = $_POST['tagsp'];
$commpo = $_POST['commentp'];


//if (is_file('./posts/'.$_POST['pseudop'].'/'.($d->format('d-m-Y H:i:s')).'.bin')) {
// $content = file_get_contents('./posts/'.$_POST['pseudop'].'/'.($d->format('d-m-Y H:i:s')).'.bin');
// $unsercontent = unserialize($content);
//foreach ($unsercontent as $post) {
//      if ($post->getPseudo() == $namepo && $post->getDiscipline() == $discipo && $post->getTitre() == $titpo && $post->getTags() == $tagpo && $post->getContenu() == $commpo) {
//          $_SESSION['utilisateur'] = $namepo;
//$_SESSION['discipo'] = $discipo;
//          $_SESSION['titpo'] = $titpo;
//$_SESSION['tagpo'] = $tagpo;
//$_SESSION['commpo'] = $commpo;
// $_SESSION['datepo'] = $d;
//}
//}
//}
//  }

//header('location:affichePost.php');
