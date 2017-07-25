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
<?php } ?>
        <div class="row">

            <?php
            foreach ($db->recupPost() as $post) {
                ?>
                <section class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2" id="<?php echo $post->getTitre(); ?>"><h1><a href="postliste.php?id=<?php echo base64_encode(serialize($post)) ?>"><?php echo $post->getTitre(); ?></a>
                    </h1>

                    <p> <?php echo $post->getAuteur(); ?> </p>
                    <p> <?php echo $post->getTags(); ?> </p>

                </section>
                <?php
            }
            ?>
        </div>
        <a href="index.php">Retour</a>
    </body>
</html>