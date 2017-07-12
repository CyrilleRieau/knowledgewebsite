<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Knowledgewebsite</title>
        <!--<script type="text/javascript" src="affichage.js"></script>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            .formconn {
                display : none;
            }

            .forminsc {
                display : none;
            }
            .form-control {
                width : 70% ;
            }
            .bor {
                border: 2px solid grey;
            }
        </style>

    </head>
    <body class="container-fluid">      

        <?php
        include_once 'header.php';
        if (!isset($_SESSION['utilisateur'])) {
            ?>
        <nav class="navbar navbar-inverse row">
                <a class="navbar-brand col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2 inscription" href="inscription.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Inscription</a>
                <a href="connexion.php" class="navbar-brand connexion col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Connexion</a>
            </nav>
            <div class="row">
                <?php
                foreach (Database::recupPost() as $unserpost) {
                    ?>
                    <section  class="col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-2 col-lg-4 col-lg-offset-1 bor" id="<?php echo $unserpost->getTitre(); ?>">
                        <h1>
                            <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><?php echo $unserpost->getTitre(); ?></a>
                        </h1>
                        <p> Auteur : <?php echo $unserpost->getAuteur(); ?> </p>
                        <p> Tags : <?php echo $unserpost->getTags(); ?> </p>
                    </section>
                    <?php
                }
            }
            ?>
        </div>
        <?php
        if (isset($_SESSION['utilisateur'])) { ?>
        <nav class="navbar navbar-inverse row" ><p class="navbar-brand" style="color:white;">Bonjour <?php echo $_SESSION['utilisateur'] ?>, vous êtes bien connecté.</p>
                <a href="logout.php" class ="navbar-brand navbar-right logout">Deconnexion</a></nav>
            <div class="row">
                <?php
                foreach (Database::recupPost() as $unserpost) {
                    ?>
                    <section class=" col-sm-3 col-sm-offset-1 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-1 bor" id="<?php echo $unserpost->getTitre(); ?>">
                        <h1>
                            <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><?php echo $unserpost->getTitre(); ?></a>
                        </h1>
                        <p> <?php echo $unserpost->getAuteur(); ?> </p>
                        <p> <?php echo $unserpost->getTags(); ?> </p>

                    </section><?php
                }
            ?>
                    
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2 form-group"><h2>Créez un post </h2>    
                    <form action="createPost.php" method="POST">
                        <label for="disciplinep">Discipline :</label><br>
                        <input class="form-control" id="disciplinep" type="text" name="disciplinep" /><br>
                        <label for="titrep">Titre :</label><br>
                        <input class="form-control" id="titrep" type="text" name="titrep" /><br>
                        <input id="titrephid" type="hidden" name="titrephid" /><br>
                        <label for="tagsp">Mots-clés :</label><br>
                        <input class="form-control" id="tagsp" type="text" name="tagsp" /><br>
                        <label for="commentp">Contenu :</label><br>
                        <textarea class="form-control" id="commentp" name="commentp" rows="4" cols="50"></textarea><br>
                        <input class="btn btn-default" type="submit" value="Send">
                    </form>
                </div>
                <div class="col-md-4 col-md-offset-2 form-group">
                    <h2>Recherchez </h2>    
                    <form action="recherche.php" method="POST">
                        <label for="pseudorec">Pseudo :</label>
                        <input class="form-control" id="pseudorec" type="text" name="pseudorec" />
                        <label for="disciplinerec">Discipline :</label>
                        <input class="form-control" id="disciplinerec" name="disciplinerec" />
                        <label for="tagsrec">Tags :</label>
                        <input class="form-control" id="tagsrec" name="tagsrec" />
                        <input class="btn btn-default" type="submit" value="Send">
                    </form>
                </div>
            </div>
            <?php
            }
            ?>
            </body>
   <!-- <script>
        window.onload = function () {
            let inscript = document.querySelector('.inscription');
            let connex = document.querySelector('.connexion');
            let formconn = document.querySelector('.formconn');
            let forminsc = document.querySelector('.forminsc');
            inscript.addEventListener('click', function () {
                if (formconn.style.display === 'none' || formconn.style.display === '') {
                    formconn.style.display = 'block';
                } else {
                    formconn.style.display = 'none';
                }
            });
            connex.addEventListener('click', function () {
                if (forminsc.style.display === 'none' || forminsc.style.display === '') {
                    forminsc.style.display = 'block';
                } else {
                    forminsc.style.display = 'none';
                }
            });
        };
    </script> -->
</html>