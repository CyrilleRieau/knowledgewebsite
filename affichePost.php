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

//echo $_SESSION['titreid'];
        if (is_dir('./posts')) {
            $users = scandir('./posts');
            $users = array_diff($users, ['..', '.']);
            foreach ($users as $user) {
                //$datas = unserialize($comment);
                $postuser = scandir('./posts/' . $user);
                $postuser = array_diff($postuser, ['..', '.']);
                foreach ($postuser as $post) {
                    if (!is_dir('./posts/' . $user . '/' . $post)) {
                        $seripost = file_get_contents('./posts/' . $user . '/' . $post);
                        $unserpost = unserialize($seripost);
                        ?>
                        <section id="<?php echo $unserpost->getTitre(); ?>"><a href=" postliste.php?id=<?php echo base64_encode($seripost)?>"><?php echo $unserpost->getTitre(); ?></a>
                            <h1> <?php echo $unserpost->getTitre(); ?> </h1>
                            
                            <p> <?php echo $unserpost->getAuteur(); ?> </p>
                            <p> <?php echo $unserpost->getTags(); ?> </p>
                            
                        </section>
                        <?php if ($_SESSION['utilisateur'] == $unserpost->getAuteur()) { ?>
                            <form action="deletePost.php" method="POST">
                                <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="fpost">
                                <input type="submit" value="Supprimer">
                            </form>
                            <form action="modifPost.php" method="GET">
                                <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="postmodif">
                                <input type="submit" value="Modifier">
                            </form>
                        <?php } ?>
                        <h1>Commentez </h1>    
                        <form action="createComment.php" method="POST">
                            <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="post">
                            <label for="comment">Commentaire :</label><br>
                            <textarea id="commentcom" name="commentcom" rows="4" cols="50"></textarea><br>
                            <input type="submit" value="Send">
                        </form>

                        <?php
                    }
                    if (!isset($_SESSION['commcom']) && !isset($_SESSION['utilisateur'])) {
                        echo 'Pas de commentaire.';
                        exit(1);
                    } if (isset($_SESSION['commcom']) == "" && isset($_SESSION['utilisateur']) == "") {
                        echo 'Pas de commentaire.';
                        exit(1);
                    }
                    if (is_dir('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s'))) {
                        $commentss = scandir('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s'));

                        $commentss = array_diff($commentss, ['..', '.', '.txt']);
                        foreach ($commentss as $comments) {

                            // if (is_dir('./comment/' . $comments)) {
                            //$datas = unserialize($comment);
                            //        $comtuser = scandir('./comment/' . $comments);
                            //      $comtuser = array_diff($comtuser, ['..', '.']);
                            //    foreach ($comtuser as $comt) {
                            //      if (!is_dir('./comment/' . $comments . '/' . $comt)) {

                            $sericomt = file_get_contents('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s') . '/' . $comments);
                            $unsercomt = unserialize($sericomt);

                            //     if ($comments === $unserpost->getDate()->format('d-m-Y H:i:s')) {
                            ?>
                            <section id="<?php echo $unsercomt->getDate()->format('d-m-Y H:i:s'); ?>">

                                <p> <?php echo $unsercomt->getContenu(); ?> </p>
                                <p> <?php echo $unsercomt->getAuteur(); ?> </p>
                                <p> <?php echo $unsercomt->getDate()->format('d-m-Y H:i:s');
                            ?> </p></section>
                            <?php if ($_SESSION['utilisateur'] == $unsercomt->getAuteur()) { ?>
                                <form action="deleteComment.php" method="POST">
                                    <input type="hidden" value="<?php echo base64_encode($sericomt) ?>" name="cpost">
                                    <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="comfpost">
                                    <input type="submit" value="Supprimer">
                                </form>

                                <form action="modifcom.php" method="GET">
                                    <input type="hidden" value="<?php echo base64_encode($sericomt) ?>" name="cpost">
                                    <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="comfpost">
                                    <input type="submit" value="Modifier">
                                </form>
                                <?php
                            }
                            //          }
                            //   }
                            // }
                            //}
                        }
                    }
                }
            }
        }
        ?>
        <a href="index.php">Retour</a>
    </body>
</html>