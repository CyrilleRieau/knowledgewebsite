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
        <div class="row">
            <?php
            foreach (Database::recupPost() as $unserpost) {
                ?>
                <section class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2" id="<?php echo $unserpost->getTitre(); ?>"><h1><a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><?php echo $unserpost->getTitre(); ?></a>
                     </h1>

                    <p> <?php echo $unserpost->getAuteur(); ?> </p>
                    <p> <?php echo $unserpost->getTags(); ?> </p>

                </section>
                <?php
            }
            ?>
        </div>
        <a href="index.php">Retour</a>
    </body>
</html>