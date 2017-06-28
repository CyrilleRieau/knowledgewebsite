<?php
// A Modifier
if(isset($_POST['fichier']))  {
    if(is_file('posts/'.$_POST['fichier'])) {
        unlink('posts/'.$_POST['fichier']);
        echo 'vous avez bien supprimé le fichier';
    }else {
        echo 'le fichier n\'existe pas';
    }
}
?>
<a href="index.php">Retour</a>