<?php
session_start();
include_once 'header.php';

use entities\User;
use entities\Comment;
use entities\Post;

//var_dump($_POST['post']);
if (!isset($_SESSION['utilisateur']) && !isset($_POST['commentcom'])) {
    echo 'Commentaire inexistant.';
    exit(1);
}
if ($_SESSION['utilisateur'] == "" || $_POST['commentcom'] == "") {
    ?><p>Commentaire non complet.<p>

        <a href="affichePost.php">Retour</a>  <?php
        exit(1);
    }
    
    foreach ($db->recupUser() as $user) {

        if ($user->getPseudo() == $_SESSION['utilisateur']) {

            if (isset($_POST['post'])) {
                $idpost = unserialize(base64_decode($_POST['post']));

                foreach ($db->recupPost() as $post) {
                    if ($post->getId() == $idpost->getId()) {

                        function createComment($user, $post) {
                            return new Comment($_POST['commentcom'], new DateTime(), $_SESSION['utilisateur'], 0, 0, $post->getId(), $user->getId());
                        }

                        $db->commentCreate(createComment($user, $post), $post, $user);

//$namecom = $_SESSION['utilisateur'];
                        $postof = $_POST['post'];
                        
                        $commcom = $_POST['commentcom'];
                        
//if (is_file('./comment/'.$_POST['pseudocom'].'/'.($d->format('d-m-Y H:i:s')) /*Problème ici*/.'.bin')) {
//  $content = file_get_contents('./posts/'.$_POST['pseudop'].'/'.($d->format('d-m-Y H:i:s')) /*Problème ici*/.'.bin');
// $unsercontent = unserialize($content);
//foreach ($unsercontent as $post) {
//   if ($post->getPseudo() == $namepo && $post->getDiscipline() == $discipo && $post->getTitre() == $titpo && $post->getTags() == $tagpo && $post->getContenu() == $commpo) {
//          $_SESSION['utilisateur'] = $namecom;
                        $_SESSION['commcom'] = $commcom;
                        
// }
//}
//}
//}
                    }
                }
            }
        }
    }
    
    header("location:postliste.php?id='" . base64_encode(serialize($post)) . '"');
    ?>    <a href="affichePost.php">Retour</a>
    

