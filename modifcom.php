<html>
    <head>
        <meta charset="UTF-8">
        <title>Modif Commentaire</title>
    </head>
    <body>
        <?php
        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        session_start();

        if (isset($_POST['post']) && isset($_POST['commentcom'])) {
         $y = unserialize(base64_decode($_GET['cpost']));
            $z = unserialize(base64_decode($_GET['comfpost']));
            $d = $y->getDate();
            $e = $z->getDate();
           
            $com = new Comment($_POST['commentcom'], $d, $_SESSION['utilisateur'], 'bloup');
            
            if (is_file('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s'))).'.bin') {
                $file = fopen('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')).'.bin', 'w');
                fwrite($file, serialize($com));
                fclose($file);
                echo 'Vous avez modifié le fichier.';
            }
        }

        if (isset($_GET['cpost']) && isset($_GET['comfpost'])) {
            
            $y = unserialize(base64_decode($_GET['cpost']));
            $z = unserialize(base64_decode($_GET['comfpost']));
            $d = $y->getDate();
            $e = $z->getDate();
            if (is_file('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                //$comment = file_get_contents('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')));
                ?>
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo ($_GET['comfpost']) ?>" name="post">
                    <input type="hidden" value="<?php echo ($_GET['cpost']) ?>" name="comment">
                    <label for="comment">Commentaire :</label><br>
                    <textarea id = "commentcom" name = "commentcom" rows = "4" cols = "50"></textarea><br>
                    <input type = "submit" value = "Modifier">

    <?php
    }
}
?>
            <a href="affichePost.php">Retour</a>
    </body>
</html>