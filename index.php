<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once'./Post.php';
        include_once'./User.php';
        include_once'./Database.php';
        include_once'./Comment.php';

        session_start();
        ?>

        <h1>Créez votre compte</h1>
        <form action="creationuser.php" method="POST">
            <label for="name">Pseudo :</label><br>
            <input id="name" type="text" name="pseudo" /><br>
            <label for="mail">Adresse Mail :</label><br>
            <input id="mail" type="text" name="mail" /><br>
            <label for="bio">Biographie :</label><br>   
            <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br>
            <label for="pass">Mot de Passe :</label><br>
            <input type="password" name="pass"/><br>
            <label for="age">Date de naissance :</label><br>
            <input type="date" name="age"/><br>
            <label for="avatar">Photo :</label><br>
            <input type="file" name="avatar"/>
            <br>
            <input type="submit" value="Send">
        </form>

        <h1>Connectez-vous </h1>    
        <form action="login.php" method="POST">
            <label for="coname">Pseudo ou Mail:</label><br>
            <input id="coname" type="text" name="coname" /><br>
            <br>
            <label for="comdp">Mot de Passe :</label><br>
            <input id="comdp" type="password" name="comdp" /><br>
            <input type="submit" value="Send">
        </form>


        <h1>Commentez un post </h1>    
        <form action="" method="POST">
            <label for="pseudo">Pseudo :</label><br>
            <input id="pseudo" type="text" name="pseudo" /><br>
            <br>
            <label for="comment">Comment :</label><br>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Send">
        </form>

        <?php

        function createComment() {
            return new Comment($_POST['comment'], new DateTime, $_POST['pseudo']);
        }

        Database::commentCreate(createComment());

        $comments = scandir("./comment");
        foreach ($comments as $comment) {
            //$datas = unserialize($comment);
            if (is_file('./comment/' . $comment)) {
                $datas = file_get_contents('./comment/' . $comment);

                $unseri = unserialize($datas);
var_dump($unseri);
                foreach ($unseri as $com) 
                    {
              var_dump($com);
                    echo '<section class=' . basename($comment,".txt") . '<h2>' . basename($comment,".txt") .'</h2>';
                    echo '<p>' . $com->getContenu() . '</p>';
                    //echo '<p>' . $com->Date . '</p></section>';
                    //echo '<form method="post" action="delete-file.php"><input type="hidden" name="fichier" value="' . $file . '"><button>Supprimer</button></form>';
                    //echo '<a href="change-file.php?fichier='
                    //.$file.'">Modifier</a>';
                }
            }
        }
        //}
        //}
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
</html>