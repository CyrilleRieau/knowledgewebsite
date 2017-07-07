<html>
    <head>
        <meta charset="UTF-8">
        <title>Modif Post</title>
    </head>
    <body>
        <?php
        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        session_start();

        if (isset($_POST['post']) && isset($_POST['commentpo']) && isset($_POST['disciplinepo']) && isset($_POST['titrepo']) && isset($_POST['tagspo'])) {
            $postmod = unserialize(base64_decode($_GET['postmodif']));
        
            $datepostmod = $postmod->getDate();
            $commentpostmod = $postmod->getContenu();
            $disciplinepostmod = $postmod->getDiscipline();
            $tagspostmod = $postmod->getTags();
            $titrepostmod = $postmod->getTitre();
            $post = new Post($_POST['commentpo'], $datepostmod, $_SESSION['utilisateur'], $_POST['titrepo'], $_POST['disciplinepo'], $_POST['titrepo'], $_POST['tagspo']);
            if (is_file('./posts/' . $_SESSION['utilisateur'] . '/' . ($datepostmod->format('d-m-Y H:i:s'))) . '.bin') {
                $file = fopen('./posts/' . $_SESSION['utilisateur'] . '/' . ($datepostmod->format('d-m-Y H:i:s')) . '.bin', 'w+');
                fwrite($file, serialize($post));
                fclose($file);
                echo 'Vous avez modifié le fichier.';
            }
        }

        if (isset($_GET['postmodif'])) {
            $modpost = unserialize(base64_decode($_GET['postmodif']));
            $datepost = $modpost->getDate();
            $postuser = $modpost->getAuteur();
            if (is_file('./posts/' . ($_SESSION['utilisateur']) . '/' . ($datepost->format('d-m-Y H:i:s')) . '.bin')) {
    ?>
                <form action="" method="POST">
                    <input type="hidden" value="<?php echo ($_GET['postmodif']) ?>" name="post">
                    <label for="disciplinepo">Discipline :</label><br>
                    <input id="disciplinepo" type="text" name="disciplinepo" /><br>
                    <label for="titrepo">Titre :</label><br>
                    <input id="titrepo" type="text" name="titrepo" /><br>
                    <input id="titrepohid" type="hidden" name="titrepohid" /><br>
                    <label for="tagspo">Mots-clés :</label><br>
                    <input id="tagspo" type="text" name="tagspo" /><br>
                    <label for="commentpo">Commentaire :</label><br>
                    <textarea id = "commentpo" name = "commentpo" rows = "4" cols = "50"></textarea><br>
                    <input type = "submit" value = "Modifier">
                </form>    
                <?php
            }
        }
        ?>
        <a href="affichePost.php">Retour</a>
    </body>
</html>