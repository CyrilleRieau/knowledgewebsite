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
            <label for="comail">Mot de Passe :</label><br>
            <input id="comail" type="text" name="comail" /><br>

            <input type="submit" value="Send">
        </form>
        <?php
        
        ?>
    </body>
</html>
