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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>

    <body class="container-fluid">
        <?php
        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
        ?>
        <?php
        if (isset($_GET['id'])) {
            $unserpost = unserialize(base64_decode($_GET['id']));
            ?>
            <h1> <?php echo $unserpost->getTitre(); ?> </h1>
            <p> Auteur : <?php echo $unserpost->getAuteur(); ?> </p>
            <p> <?php echo $unserpost->getDate()->format('d-m-Y H:i:s'); ?> </p>
            <p> Tags : <?php echo $unserpost->getTags(); ?> </p>
            <p style="border:2px gainsboro solid"> <?php echo $unserpost->getContenu(); ?> </p>


            <?php if ($_SESSION['utilisateur'] == $unserpost->getAuteur()) { ?>
                <form class="form-group" action="deletePost.php" method="POST">
                    <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="fpost">
                    <input class="btn btn-default" type="submit" value="Supprimer">
                </form>
                <form class="form-group" action="modifPost.php" method="GET">
                    <input type="hidden" value="<?php echo base64_encode($seripost) ?>" name="postmodif">
                    <input class="btn btn-default" type="submit" value="Modifier">
                </form>
            <?php } ?>

            <div class="row">

                <section  class="col-sm-4 col-md-4 col-lg-4">   
                    <h1>Commentez </h1>    
                    <form class="form-group" action="createComment.php" method="POST">
                        <input type="hidden" value="<?php echo base64_encode(serialize($unserpost)) ?>" name="post">
                        <label for="comment">Commentaire :</label><br>
                        <textarea class="form-control" id="commentcom" name="commentcom" rows="4" cols="50"></textarea><br>
                        <input class="btn btn-default" type="submit" value="Send">
                    </form>
                </section>

                <?php
                if (!isset($_SESSION['commcom']) && !isset($_SESSION['utilisateur'])) {
                    echo 'Pas de commentaire.';
                    exit(1);
                } if (isset($_SESSION['commcom']) == "" && isset($_SESSION['utilisateur']) == "") {
                    echo 'Pas de commentaire.';
                    exit(1);
                }
                if (is_dir('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s'))) {
                    $commentss = scandir('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s'));

                    $commentss = array_diff($commentss, ['..', '.', '.txt']); ?>
                    <section class="col-sm-8 col-md-8 col-lg-8">
                        <?php
                    foreach ($commentss as $comments) {

                        // if (is_dir('./comment/' . $comments)) {
                        //$datas = unserialize($comment);
                        //        $comtuser = scandir('./comment/' . $comments);
                        //      $comtuser = array_diff($comtuser, ['..', '.']);
                        //    foreach ($comtuser as $comt) {
                        //      if (!is_dir('./comment/' . $comments . '/' . $comt)) {

                        $sericomt = file_get_contents('./comment/' . $unserpost->getDate()->format('d-m-Y H:i:s') . '/' . $comments);
                        $unsercomt = unserialize($sericomt);
                        ?>
                        <section class="col-sm-4 col-md-4 col-lg-4" id="<?php echo $unsercomt->getDate()->format('d-m-Y H:i:s'); ?>">
                            <?php
                            //     if ($comments === $unserpost->getDate()->format('d-m-Y H:i:s')) {
                            ?>

                            <p > <?php echo $unsercomt->getContenu(); ?> </p>
                            <p> <?php echo $unsercomt->getAuteur(); ?> </p>
                            <p> <?php echo $unsercomt->getDate()->format('d-m-Y H:i:s');
                            ?> </p>
                            <?php if ($_SESSION['utilisateur'] == $unsercomt->getAuteur()) { ?>
                                <form class="form-group" action="deleteComment.php" method="POST">
                                    <input type="hidden" value="<?php echo base64_encode($sericomt) ?>" name="cpost">
                                    <input type="hidden" value="<?php echo base64_encode(serialize($unserpost)) ?>" name="comfpost">
                                    <input class="btn btn-default" type="submit" value="Supprimer">
                                </form>

                                <form class="form-group" action="modifcom.php" method="GET">
                                    <input type="hidden" value="<?php echo base64_encode($sericomt) ?>" name="cpost">
                                    <input type="hidden" value="<?php echo base64_encode(serialize($unserpost)) ?>" name="comfpost">
                                    <input class="btn btn-default" type="submit" value="Modifier">
                                </form>
</section>

                                <?php
                            }
                        }
                    ?>
                    </section>  
                      <?php      
                      
                            }
                    ?>
                
           
        </div> 
        <?php
    }
    if (!isset($_GET['id'])) {
        header('location:affichePost.php');
    }
    ?>

    <a href="affichePost.php">Retour</a>             
</body>
</html>
