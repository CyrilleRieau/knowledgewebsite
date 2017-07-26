<?php
session_start();
include_once 'header.php';

use entities\User;
use entities\Post;
use entities\Comment;
?>
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
        <style>
            .comm {
                border : 1px solid grey; 
            }
        </style>
    </head>

    <body class="container-fluid">
        <?php
        if (!isset($_SESSION['utilisateur'])) {
            ?>
            <nav class="navbar navbar-inverse row">
                <a class="navbar-brand col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2 inscription" href="inscription.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Inscription</a>
                <a href="connexion.php" class="navbar-brand connexion col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Connexion</a>
            </nav>
            <?php
        }
        if (isset($_SESSION['utilisateur'])) {
            ?>
            <nav class="navbar navbar-inverse row" ><p class="navbar-brand" style="color:white;">Bonjour <a href="afficheUser.php?id=<?php echo $_SESSION['utilisateur'] ?>"><?php echo $_SESSION['utilisateur'] ?></a>, vous êtes bien connecté.</p>
                <a href="logout.php" class ="navbar-brand navbar-right logout">Deconnexion</a></nav>
            <?php
        }



        if (isset($_GET['id'])) {
            $id = unserialize(base64_decode($_GET['id']));
            foreach ($db->recupPost() as $post) {
                if ($post->getId() == $id->getId()) {
                    ?>
                    <h1> <?php echo $post->getTitre(); ?> </h1>
                    <p> Auteur : <?php echo $post->getAuteur(); ?> </p>
                    <p> <?php echo $post->getDate(); ?> </p>
                    <p> Tags : <?php echo $post->getTags(); ?> </p>
                    <p class="contenu" style="border:2px gainsboro solid"> <?php echo $post->getContenu(); ?> </p>


                    <?php
                    if (isset($_SESSION['utilisateur'])) {
                        if ($_SESSION['utilisateur'] == $post->getAuteur()) {
                            ?>
                            <form class="form-group" action="deletePost.php" method="POST">
                                <input type="hidden" value="<?php echo base64_encode(serialize($post)) ?>" name="fpost">
                                <input class="btn btn-default" type="submit" value="Supprimer">
                            </form>
                            <form class="form-group" action="modifPost.php" method="GET">
                                <input type="hidden" value="<?php echo base64_encode(serialize($post)) ?>" name="postmodif">
                                <input class="btn btn-default" type="submit" value="Modifier">
                            </form>
                            <?php
                        }
                    }
                    ?>

                    <div class="row">

                        <section  class="col-sm-4 col-md-4 col-lg-4">   
                            <h1>Commentez </h1>    
                            <form class="form-group" action="createComment.php" method="POST">
                                <input type="hidden" value="<?php echo base64_encode(serialize($post)) ?>" name="post">
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
                        ?>
                        <section class="col-sm-8 col-md-8 col-lg-8">

                            <?php
                            foreach ($db->recupComment($post) as $comment) {
                                if ($comment->getPost_id() == $post->getId()) {
                                ?>
                                <section class="comm col-sm-4 col-md-4 col-lg-4" id="<?php echo $comment->getDate(); ?>">
                                    <?php
                                    
                                        ?>

                                        <p > <?php echo $comment->getContenu(); ?> </p>
                                        <p> <?php echo $comment->getAuteur(); ?> </p>
                                        <p> <?php echo $comment->getDate(); ?></p>

                                        <?php if ($_SESSION['utilisateur'] == $comment->getAuteur()) { ?>
                                            <form class="form-group" action="deleteComment.php" method="POST">
                                                <input type="hidden" value="<?php echo base64_encode(serialize($comment)) ?>" name="cpost">
                                                <input type="hidden" value="<?php echo base64_encode(serialize($post)) ?>" name="comfpost">
                                                <input class="btn btn-default" type="submit" value="Supprimer">
                                            </form>

                                            <form class="form-group" action="modifcom.php" method="GET">
                                                <input type="hidden" value="<?php echo base64_encode(serialize($comment)) ?>" name="cpost">
                                                <input type="hidden" value="<?php echo base64_encode(serialize($post)) ?>" name="comfpost">
                                                <input class="btn btn-default" type="submit" value="Modifier">
                                            </form>
                                            <?php
                                        }
                                    }
                                    ?>
                                </section>
                                <?php
                            }
                            ?>
                        </section>  
                    </div> 
                    <?php
                }
            }
        }

        /* if (!isset($_GET['id'])) {
          header('location:affichePost.php');
          } */
        ?>

        <a href="affichePost.php">Retour</a>             
    </body>
</html>
