<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
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
        <section class="forminsc form-group">
             <h1>Connectez-vous </h1>    
                    <form action="login.php" method="POST" >
                        <label for="coname">Pseudo ou Mail:</label><br>
                        <input class="form-control" id="coname" type="text" name="coname" /><br>
                        <br>
                        <label for="comdp">Mot de Passe :</label><br>
                        <input class="form-control" id="comdp" type="password" name="comdp" /><br>
                        <input class="btn btn-default" type="submit" value="Send">
                    </form>
                </section>
        <?php
        // put your code here
        ?>
    </body>
</html>
