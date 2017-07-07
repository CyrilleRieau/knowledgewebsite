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
        </style>

    </head>
    <body class="container-fluid">      

        <?php
        include_once'./Post.php';
        include_once'./User.php';
        include_once'./Database.php';
        include_once'./Comment.php';
        if (!isset($_SESSION['utilisateur'])) {
            ?>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2"><a href="inscription.php" class="inscription" >Inscription</a></div>
                <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2"><a href="connexion.php" class="connexion" >Connexion</a></div>
            </div>
            <?php
            /* Database::logUser();
             */

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
                            <section id="<?php echo $unserpost->getTitre(); ?>"><a href=" postliste.php?id=<?php echo base64_encode($seripost) ?>"><?php echo $unserpost->getTitre(); ?></a>
                                <h1> <?php echo $unserpost->getTitre(); ?> </h1>

                                <p> <?php echo $unserpost->getAuteur(); ?> </p>
                                <p> <?php echo $unserpost->getTags(); ?> </p>

                            </section><?php
                        }
                    }
                }
            }
        }
        if (isset($_SESSION['utilisateur'])) {
            echo 'Bonjour ' . $_SESSION['utilisateur'] . ', vous êtes bien connecté.';
            ?>
            <a href="logout.php" class ="logout">Deconnexion</a>

            <!--
                /* }
                  // Database::formlog();

                  //if (isset($_POST['coname']) && isset($_POST['comdp'])) {
                  Database::logcreate();
                  Database::login();
                  } */
            -->
            <h1>Créez un post </h1>    
            <form action="createPost.php" method="POST">
                <label for="disciplinep">Discipline :</label><br>
                <input id="disciplinep" type="text" name="disciplinep" /><br>
                <label for="titrep">Titre :</label><br>
                <input id="titrep" type="text" name="titrep" /><br>
                <input id="titrephid" type="hidden" name="titrephid" /><br>
                <label for="tagsp">Mots-clés :</label><br>
                <input id="tagsp" type="text" name="tagsp" /><br>
                <label for="commentp">Contenu :</label><br>
                <textarea id="commentp" name="commentp" rows="4" cols="50"></textarea><br>
                <input type="submit" value="Send">
            </form>

            <h1>Recherchez </h1>    
            <form action="" method="POST">
                <label for="pseudorec">Pseudo :</label><br>
                <input id="pseudorec" type="text" name="pseudorec" /><br>
                <br>
                <label for="disciplinerec">Discipline :</label><br>
                <input id="disciplinerec" name="disciplinerec" /><br>
                <input type="submit" value="Send">
            </form>
            <?php
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
                            <section id="<?php echo $unserpost->getTitre(); ?>">
                                <h1>
                                    <a href=" postliste.php?id=<?php echo base64_encode($seripost) ?>"><?php echo $unserpost->getTitre(); ?></a>
                                </h1><p> <?php echo $unserpost->getAuteur(); ?> </p>
                                <p> <?php echo $unserpost->getTags(); ?> </p>

                            </section><?php
                        }
                    }
                }
            }

            /* $comments = scandir("./comment");
              foreach ($comments as $comment) {
              //$datas = unserialize($comment);
              if (is_file('./comment/' . $comment)) {
              $datas = file_get_contents('./comment/' . $comment);
              $unseri = unserialize($datas);
              foreach ($unseri as $com) {
              echo '<section class=' . basename($comment, ".bin") . '><h2>' . $com->getAuteur() . '</h2>';
              echo '<p>' . $com->getContenu() . '</p></section>';
              //echo '<p>' . $com->Date . '</p></section>';
              //echo '<form method="post" action="delete-file.php"><input type="hidden" name="fichier" value="' . $file . '"><button>Supprimer</button></form>';
              //echo '<a href="change-file.php?fichier='
              //.$file.'">Modifier</a>';
              }
              }
              }
             */


//Modifier la recherche pour que fonctionne en fonction du post de recherche
            if (isset($_POST['pseudorec'])) {
                $posts = scandir('./posts/' . $_POST['pseudorec']);
                foreach ($posts as $post) {
                    //$datas = unserialize($comment);
                    if (is_dir('./posts/' . $_POST['pseudorec'])) {
                        if (is_file('./posts/' . $_POST['pseudorec'] . '/' . $post)) {
                            $datas = file_get_contents('./posts/' . $_POST['pseudorec'] . '/' . $post);
                            $unseri = unserialize($datas);
                            foreach ($unseri as $pot) {
                                echo '<section class=' . basename($post, ".txt") . '><h2>' . $pot->getAuteur() . '</h2>';
                                echo '<p>' . $pot->getContenu() . '</p></section>';
                                //echo '<p>' . $com->Date . '</p></section>';
                                //echo '<form method="post" action="delete-file.php"><input type="hidden" name="fichier" value="' . $file . '"><button>Supprimer</button></form>';
                                //echo '<a href="change-file.php?fichier='
                                //.$file.'">Modifier</a>';
                            }
                        }
                    }
                }
            }
        }

//Modifier Login et Logout pour que fonctionne correctement et le mettre dans Database
        ?>

        <!--
        
         if ((isset($_SESSION['pseudo']) || isset($_SESSION['mail'])) && isset($_SESSION['pass'])) {
                    $pass = $_SESSION['pass'];
                    $pseudo = $_SESSION['pseudo'];
                    $mail = $_SESSION['mail'];
                    $avatar = $_SESSION['avatar'];
                    $passhach = md5($pass);
                    $age = $_SESSION['age'];
                    $bio = $_SESSION['bio'];
                    Database::getUser();
                } else {
                    createUser($_SESSION['pseudo'], $_SESSION['bio'],  $_SESSION['avatar'], $_SESSION['age'] , $_SESSION['mail'], $passhach);
                    $this->user->userCreate();
                    
                }
               
                $_SESSION['pass'] = $pass;
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['mail'] = $mail;
                $_SESSION['avatar'] = $avatar;
                $_SESSION['age'] = $age;
                $_SESSION['bio'] = $bio;
                ?> -->
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