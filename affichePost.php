<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Affichage Post</title>
    </head>
    <body>
        <?php
        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        session_start();
        if (is_dir('./posts')) {
            $users = scandir('./posts');
            $users = array_diff($users, ['..', '.']);
            foreach ($users as $user) {
                //$datas = unserialize($comment);
                $postuser = scandir('./posts/' . $user);
                $postuser = array_diff($postuser, ['..', '.']);
                foreach ($postuser as $post) {
                    if (!is_dir($post)) {
                        $seripost = file_get_contents('./posts/' . $user . '/' . $post);
                        $unserpost = unserialize($seripost);
                        ?>
                        <section id="<?php echo $unserpost->getTitre(); ?>"><a href=" <?php echo $unserpost->getTitre(); ?>"><?php echo $unserpost->getTitre(); ?></a>
                            <h1> <?php echo $unserpost->getTitre(); ?> </h1>
                            <p> <?php echo $unserpost->getContenu(); ?> </p>
                            <p> <?php echo $unserpost->getAuteur(); ?> </p>
                            <p> <?php echo $unserpost->getTags(); ?> </p>
                            <p> <?php echo $unserpost->getDate()->format('d-m-Y H:i:s'); ?> </p>
                        </section>
                        <?php
                        $titreid = ($unserpost->getTitre());

                        $_SESSION['titreid'] = $titreid;
//Rajouter conditions d'id identiques entre post et comment pour associer les 2
                        if (!isset($_SESSION['commcom']) && !isset($_SESSION['pseudocom'])) {
                            echo 'Pas de commentaire.';
                            exit(1);
                        } if (isset($_SESSION['commcom']) == "" && isset($_SESSION['pseudocom']) == "") {
                            echo 'Pas de commentaire.';
                            exit(1);
                        }
                        if (is_dir('./comment')) {
                            $commentss = scandir('./comment');
                            $commentss = array_diff($commentss, ['..', '.', '.txt']);
                            foreach ($commentss as $comments) {
                                if (is_dir('./comment/' . $comments)) {
                                    //$datas = unserialize($comment);
                                    $comtuser = scandir('./comment/' . $comments);
                                    $comtuser = array_diff($comtuser, ['..', '.']);
                                    foreach ($comtuser as $comt) {
                                        if (!is_dir($comt)) {
                                            $sericomt = file_get_contents('./comment/' . $comments . '/' . $comt);
                                            $unsercomt = unserialize($sericomt);
                                            ?>
                                            <section id=<?php echo $_SESSION['titreid']; ?>>

                                                <p> <?php echo $unsercomt->getContenu(); ?> </p>
                                                <p> <?php echo $unsercomt->getAuteur() ?> </p>
                                                <p> <?php
                                                    $d = new DateTime();
                                                    $d->format('d-m-Y H:i:s')
                                                    ?> </p></section>
                                            <?php
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                        <h1>Commentez </h1>    
                        <form action="createComment.php" method="POST">
                            <label for="pseudo">Pseudo :</label><br>
                            <input id="pseudocom" type="text" name="pseudocom" /><br>
                            <br>
                            <label for="comment">Commentaire :</label><br>
                            <textarea id="commentcom" name="commentcom" rows="4" cols="50"></textarea><br>
                            <input type="submit" value="Send">
                        </form>
                        <?php
                    }
                }
            }
        }
        ?>
    </body>
</html>