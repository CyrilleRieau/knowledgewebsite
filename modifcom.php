<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modif Commentaire</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            .wod {
                width: 75%;
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
        <?php    } 

        if (isset($_POST['post']) && isset($_POST['commentcom'])) {
            $y = unserialize(base64_decode($_GET['cpost']));
            $z = unserialize(base64_decode($_GET['comfpost']));
            $d = $y->getDate();
            $e = $z->getDate();

            $com = new Comment($_POST['commentcom'], $d, $_SESSION['utilisateur'], 'bloup');
            $db->modifCom($com, $y, $z);
            /* if (is_file('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s'))).'.bin') {
              $file = fopen('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')).'.bin', 'w');
              fwrite($file, serialize($com));
              fclose($file);
             */
            echo 'Vous avez modifié le fichier.';
        }


        if (isset($_GET['cpost']) && isset($_GET['comfpost'])) {

            $y = unserialize(base64_decode($_GET['cpost']));
            $z = unserialize(base64_decode($_GET['comfpost']));
            $d = $y->getDate();
            $e = $z->getDate();
            if (is_file('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                //$comment = file_get_contents('./comment/' . ($e->format('d-m-Y H:i:s')) . '/' . ($d->format('d-m-Y H:i:s')));
                ?>
                <form class="form-group" action="" method="POST">
                    <input type="hidden" value="<?php echo ($_GET['comfpost']) ?>" name="post">
                    <input type="hidden" value="<?php echo ($_GET['cpost']) ?>" name="comment">
                    <label for="comment">Commentaire :</label><br>
                    <textarea class="form-control wod" id="commentcom" name="commentcom" rows="4" cols="50"></textarea><br>
                    <input class="btn btn-default" type="submit" value="Modifier">

                    <?php
                }
            }
            ?>
            <a href="postliste.php">Retour</a>
    </body>
</html>