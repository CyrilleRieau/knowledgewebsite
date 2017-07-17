<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Modif Profil</title>
    </head>
    <body class="container-fluid">
        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2">
            <?php
            include_once 'header.php';


            if (isset($_POST['usemod']) && isset($_POST['pseudomod']) && isset($_POST['mailmod']) && isset($_POST['biomod']) && isset($_POST['mdpmod']) && isset($_POST['agemod']) && isset($_POST['avatarmod'])) {

                $usermodif = unserialize(base64_decode($_GET['usermod']));

                $pseudusmod = $usermodif->getPseudo();
                $biousmod = $usermodif->getBio();
                $mailusmod = $usermodif->getMail();
                $avatusmod = $usermodif->getAvatar();
                $passusmod = $usermodif->getPassword();
                $ageusmod = $usermodif->getAge();
                $usermodi = new User($_POST['pseudomod'], $_POST['biomod'], $_POST['avatarmod'], $_POST['agemod'], $_POST['mailmod'], md5(htmlspecialchars($_POST['mdpmod'])));

                Database::modifUser($usermodif, $usermodi);


                echo 'Vous avez modifié l\'utilisateur.</br>';
                ?>
                <a href = "index.php">Retour</a>   
                <?php
            }

            if (isset($_GET['usermod']) && !isset($_POST['pseudomod'])) {
                $moduser = unserialize(base64_decode($_GET['usermod']));
                if (is_file('./users/users.bin')) {
                    ?>
                <p>* : Champs obligatoires</p>
                    <form class="form-group " action="" method="POST">
                        <input type="hidden" value="<?php echo ($_GET['usermod']) ?>" name="usemod">
                        <label for="pseudomod">Pseudo :</label><br>
                        <input class="form-control" id="disciplinepo" type="text" name="pseudomod" value="<?php echo $moduser->getPseudo(); ?>"/><br>
                        <label for="mailmod">Mail :</label><br>
                        <input class="form-control" id="mailmod" type="text" name="mailmod" value="<?php echo $moduser->getMail(); ?>"/><br>
                        <label for="biomod">Biographie :</label><br>
                        <textarea class="form-control" id="biomod" type="text" name="biomod" rows="4" cols="50" ><?php echo $moduser->getBio(); ?></textarea><br>
                        <label for="mdpmod">Mot de passe :</label>*<br>
                        <input type="password" class="form-control" id="mdpmod" name="mdpmod"/><br>
                        <label for="agemod">Date de naissance :</label><br>
                        <input class="form-control" type="date" name="agemod"value="<?php echo $moduser->getAge(); ?>"/><br>
                        <label for="avatarmod">Photo :</label><br>
                        <input class="form-control" type="file" name="avatarmod" value="<?php echo $moduser->getAvatar(); ?>"/>                    <br>
                        <input class="btn btn-default" type="submit" value="Modifier">
                    </form>    
                    <?php
                }
            }
            ?>

            <a href = "afficheUser.php?id=<?php echo $moduser->getPseudo() ?>">Retour</a>   
        </div></body>
</html>
