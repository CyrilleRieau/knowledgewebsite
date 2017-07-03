
        <?php

include_once'./User.php';
include_once'./Database.php';
include_once'./Post.php';
include_once'./Comment.php';
session_start();

function createComment() {
   return new Comment($_POST['commentcom'], new DateTime, $_POST['pseudocom'], $_SESSION['titreid']);
   
}
Database::commentCreate(createComment());

if (!isset($_POST['pseudocom']) && !isset($_POST['commentcom'])) {
    echo 'Commentaire inexistant.';
    exit(1);
}
 if ($_POST['pseudocom'] == "" || $_POST['commentcom']=="") {
    echo 'Commentaire non complet.';
    exit(1);
}
$namecom = $_POST['pseudocom'];
$commcom = $_POST['commentcom'];
//if (is_file('./comment/'.$_POST['pseudocom'].'/'.($d->format('d-m-Y H:i:s')) /*Problème ici*/.'.bin')) {
  //  $content = file_get_contents('./posts/'.$_POST['pseudop'].'/'.($d->format('d-m-Y H:i:s')) /*Problème ici*/.'.bin');
   // $unsercontent = unserialize($content);
    
    //foreach ($unsercontent as $post) {
     //   if ($post->getPseudo() == $namepo && $post->getDiscipline() == $discipo && $post->getTitre() == $titpo && $post->getTags() == $tagpo && $post->getContenu() == $commpo) {
            $_SESSION['pseudocom'] = $namecom;
            $_SESSION['commcom'] = $commcom;
            
           // }
    //}
//}
header('location:affichePost.php');
?>
