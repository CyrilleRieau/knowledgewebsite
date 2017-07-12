<?php

include_once 'header.php';


//A modifier
if (isset($_POST['fichier']) && isset($_POST['contenu'])) {
    $fileName = htmlspecialchars($_POST['fichier']);
    $content = htmlspecialchars($_POST['contenu']);
    if (is_file('posts/' . $fileName)) {
        $file = fopen('posts/' . $fileName, 'w');
        fwrite($file, $content);
        fclose($file);
        echo 'vous avez modifié le fichier.';
    }
}
if (isset($_GET['fichier'])) {
    $file = htmlspecialchars($_GET['fichier']);
    if (is_file('posts/' . $file)) { ?>
        <h2> <?php echo basename($file, ".txt") ?> </h2>
        <?php $content = file_get_contents('posts/' . $file); ?>
        <form class="form-group" method="post" action="">'
        <input type="hidden" name="fichier" value="<?php echo $file  ?>">
        <textarea class="form-control" name="contenu"><?php echo $content ?></textarea>
        <button>Modifier</button>
        </form> 
        <?php
    }
}
?>
