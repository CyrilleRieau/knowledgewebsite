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
        session_start();
        ?>
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
