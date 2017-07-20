<?php
session_start();
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
        <title>Inscription</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            .form-control {
                width : 25%;
            }
            </style>
    </head>
    <body>
        <?php
                include_once 'header.php';
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
        <?php    } ?>

        
        <section class="formconn form-group">
            <h1>Créez votre compte</h1>
            <form action="creationuser.php"  method="POST">
                <label for="name">Pseudo :</label><br>
                <input class="form-control" id="name" type="text" name="pseudo" /><br>
                <label for="mail">Adresse Mail :</label><br>
                <input class="form-control" id="mail" type="email" name="mail" /><br>
                <label for="bio">Biographie :</label><br>   
                <textarea class="form-control" id="bio" name="bio" rows="4" cols="50"></textarea><br>
                <label for="pass">Mot de Passe :</label><br>
                <input class="form-control" type="password" name="pass"/><br>
                <label for="age">Date de naissance :</label><br>
                <input class="form-control" type="date" name="age"/><br>
                <label for="avatar">Photo :</label><br>
                <input class="form-control" type="file" name="avatar"/>
                <br>
                <input class="btn btn-default" type="submit" value="Send">
            </form>
        </section>
        <?php
        // put your code here
        ?>
    </body>
</html>
