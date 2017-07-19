
<?php

include_once 'header.php';

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

 if ($_SESSION['utilisateur'] == "" && $_POST['commentcom'] == "") {
     ?><p>Commentaire non complet.</p>
 <a href="affichePost.php">Retour</a>  
<?php
exit(1);
    
}

function createComment() {
    return new Comment($_POST['commentcom'], new DateTime(), $_SESSION['utilisateur'], 'bloup');
}

$db->commentCreate(createComment(), unserialize(base64_decode($_POST['post'])));


//$namecom = $_SESSION['utilisateur'];
$post = $_POST['post'];
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
header("location:postliste.php?id=$post");
?>
