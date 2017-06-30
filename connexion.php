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
        session_start();
        ?>
        <section class="forminsc">
             <h1>Connectez-vous </h1>    
                    <form action="login.php" method="POST" >
                        <label for="coname">Pseudo ou Mail:</label><br>
                        <input id="coname" type="text" name="coname" /><br>
                        <br>
                        <label for="comdp">Mot de Passe :</label><br>
                        <input id="comdp" type="password" name="comdp" /><br>
                        <input type="submit" value="Send">
                    </form>
                </section>
        <?php
        // put your code here
        ?>
    </body>
</html>
