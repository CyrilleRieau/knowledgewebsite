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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Affichage User</title>
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
        <?php
        }
        if (isset($_SESSION['utilisateur'])) { 
            ?>
        <nav class="navbar navbar-inverse row" ><p class="navbar-brand" style="color:white;">Bonjour <a href="afficheUser.php?id=<?php echo $_SESSION['utilisateur'] ?>"><?php echo $_SESSION['utilisateur'] ?></a>, vous êtes bien connecté.</p>
                <a href="logout.php" class ="navbar-brand navbar-right logout">Deconnexion</a></nav>
        <?php    } ?>
        
        <div class="row">
            <?php
            foreach ($db->recupUser() as $user) {
                if ($_GET['id'] == $user->getPseudo()) {
                    ?>
                    <section class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-3 col-lg-4 col-lg-offset-2" id="<?php echo $user->getPseudo(); ?>">


                        <h1> <?php echo $user->getPseudo(); ?> </h1>
                        <p> <?php echo $user->getBio(); ?> </p>
                        <p> <?php echo $user->getAge(); ?> </p>
                        <p> <?php echo $user->getMail(); ?> </p>
                        <p> <?php echo $user->getAvatar(); ?> </p>
                        <form class="form-group" action="deleteUser.php" method="POST">
                            <input type="hidden" value="<?php echo base64_encode(serialize($user)) ?>" name="duser">
                            <input class="btn btn-default" type="submit" value="Supprimer">
                        </form>
                        <form class="form-group" action="modifUser.php" method="GET">
                            <input type="hidden" value="<?php echo base64_encode(serialize($user)) ?>" name="usermod">
                            <input class="btn btn-default" type="submit" value="Modifier">
                        </form>
                    </section>
                    <?php
                }
            }
            ?>
        </div>
        <a href="index.php">Retour</a>
    </body>
</html>
