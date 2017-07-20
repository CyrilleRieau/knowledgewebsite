<?php
session_start();
?>
<!DOCTYPE html>
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
        <title>Recherche</title>
    </head>
    <body>
        <?php
        include_once 'header.php';if (!isset($_SESSION['utilisateur'])) {
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

        if (!isset($_POST['pseudorec']) && (!isset($_POST['pseudorec']))) {
            echo 'Pas de champs remplis';
            ?>
            <a href="index.php">Retour</a>
            <?php
        }
        if ($_POST['pseudorec'] != "" && $_POST['disciplinerec'] == "" && $_POST['tagsrec'] == "") {
            if (is_dir('./posts/' . $_POST['pseudorec'])) {
                $posts = scandir('./posts/' . $_POST['pseudorec']);
                foreach ($posts as $post) {
                    if (is_file('./posts/' . $_POST['pseudorec'] . '/' . $post)) {
                        $datas = file_get_contents('./posts/' . $_POST['pseudorec'] . '/' . $post);
                        $unserpost = unserialize($datas);
                        ?>
                        <section class="<?php echo $unserpost->getTitre() ?>">
                            <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                            <h2><?php echo $unserpost->getAuteur() ?></h2>
                            <p><?php echo $unserpost->getContenu() ?></p>
                            <p><?php echo $unserpost->getDiscipline() ?></p></section>
                        <?php
                    }
                }
            }
        }
        if ($_POST['disciplinerec'] != "" && $_POST['pseudorec'] == "" && $_POST['tagsrec'] == "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['disciplinerec'] === $unserpost->getDiscipline()) {
                    ?>
                    <section class="<?php echo $unserpost->getTitre() ?>">
                        <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                        <h2><?php echo $unserpost->getAuteur() ?></h2>
                        <p><?php echo $unserpost->getContenu() ?></p>
                        <p><?php echo $unserpost->getDiscipline() ?></p></section>
                    <?php
                }
            }
        }
        if ($_POST['tagsrec'] != "" && $_POST['pseudorec'] == "" && $_POST['disciplinerec'] == "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['tagsrec'] === $unserpost->getTags()) {
                    ?>
                    <section class="<?php echo $unserpost->getTitre() ?>">
                        <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                        <h2><?php echo $unserpost->getAuteur() ?></h2>
                        <p><?php echo $unserpost->getContenu() ?></p>
                        <p><?php echo $unserpost->getDiscipline() ?></p></section>
                    <?php
                }
            }
        }
        if ($_POST['tagsrec'] != "" && $_POST['pseudorec'] != "" && $_POST['disciplinerec'] == "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['tagsrec'] === $unserpost->getTags() && is_dir('./posts/' . $_POST['pseudorec'])) {
                    $posts = scandir('./posts/' . $_POST['pseudorec']);
                    foreach ($posts as $post) {
                        if (is_file('./posts/' . $_POST['pseudorec'] . '/' . $post)) {
                            $datas = file_get_contents('./posts/' . $_POST['pseudorec'] . '/' . $post);
                            $unserpost = unserialize($datas); {
                                ?>
                                <section class="<?php echo $unserpost->getTitre() ?>">
                                    <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                                    <h2><?php echo $unserpost->getAuteur() ?></h2>
                                    <p><?php echo $unserpost->getContenu() ?></p>
                                    <p><?php echo $unserpost->getDiscipline() ?></p></section>
                                <?php
                            }
                        }
                    }
                }
            }
        }
        if ($_POST['tagsrec'] == "" && $_POST['pseudorec'] != "" && $_POST['disciplinerec'] != "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['disciplinerec'] === $unserpost->getDiscipline() && is_dir('./posts/' . $_POST['pseudorec'])) {
                    $posts = scandir('./posts/' . $_POST['pseudorec']);
                    foreach ($posts as $post) {
                        if (is_file('./posts/' . $_POST['pseudorec'] . '/' . $post)) {
                            $datas = file_get_contents('./posts/' . $_POST['pseudorec'] . '/' . $post);
                            $unserpost = unserialize($datas); {
                                ?>
                                <section class="<?php echo $unserpost->getTitre() ?>">
                                    <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                                    <h2><?php echo $unserpost->getAuteur() ?></h2>
                                    <p><?php echo $unserpost->getContenu() ?></p>
                                    <p><?php echo $unserpost->getDiscipline() ?></p></section>
                                <?php
                            }
                        }
                    }
                }
            }
        }
        if ($_POST['tagsrec'] == "" && $_POST['pseudorec'] != "" && $_POST['disciplinerec'] == "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['tagsrec'] === $unserpost->getTags() && $_POST['disciplinerec'] === $unserpost->getDiscipline()) {
                    ?>
                    <section class="<?php echo $unserpost->getTitre() ?>">
                        <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                        <h2><?php echo $unserpost->getAuteur() ?></h2>
                        <p><?php echo $unserpost->getContenu() ?></p>
                        <p><?php echo $unserpost->getDiscipline() ?></p></section>
                    <?php
                }
            }
        }
        if ($_POST['tagsrec'] != "" && $_POST['pseudorec'] != "" && $_POST['disciplinerec'] != "") {
            foreach ($db->recupPost() as $unserpost) {
                if ($_POST['disciplinerec'] == $unserpost->getDiscipline() && $_POST['tagsrec'] == $unserpost->getTags() && is_dir('./posts/' . $_POST['pseudorec'])) {
                    $posts = scandir('./posts/' . $_POST['pseudorec']);
                    foreach ($posts as $post) {
                        if (is_file('./posts/' . $_POST['pseudorec'] . '/' . $post)) {
                            $datas = file_get_contents('./posts/' . $_POST['pseudorec'] . '/' . $post);
                            $unserpost = unserialize($datas); {
                                ?>
                                <section class="<?php echo $unserpost->getTitre() ?>">
                                    <a href=" postliste.php?id=<?php echo base64_encode(serialize($unserpost)) ?>"><h1><?php echo $unserpost->getTitre() ?></h1></a>
                                    <h2><?php echo $unserpost->getAuteur() ?></h2>
                                    <p><?php echo $unserpost->getContenu() ?></p>
                                    <p><?php echo $unserpost->getDiscipline() ?></p></section>
                        <?php
                    }
                }
            }
        }
    }
}
?>
        <a href="index.php">Retour</a>
    </body>
</html>