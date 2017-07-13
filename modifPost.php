<html>
    <head>
        <meta charset="UTF-8">
        <title>Modif Post</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <?php
        include_once 'header.php';


        if (isset($_POST['post']) && isset($_POST['commentpo']) && isset($_POST['disciplinepo']) && isset($_POST['titrepo']) && isset($_POST['tagspo'])) {
            if ($_POST['post'] =="" || $_POST['commentpo']=="" || $_POST['disciplinepo']=="" || $_POST['titrepo']=="" || $_POST['tagspo'] =="") {
            echo 'Vous n\'avez pas modifié le Post dans son entièreté.';
                
            }
            $postmod = unserialize(base64_decode($_GET['postmodif']));

                $datepostmod = $postmod->getDate();
                $commentpostmod = $postmod->getContenu();
                $disciplinepostmod = $postmod->getDiscipline();
                $tagspostmod = $postmod->getTags();
                $titrepostmod = $postmod->getTitre();
                $post = new Post($_POST['commentpo'], $datepostmod, $_SESSION['utilisateur'], $_POST['titrepo'], $_POST['disciplinepo'], $_POST['titrepo'], $_POST['tagspo']);
                
                Database::modifPost($_SESSION['utilisateur'], $postmod, $post);
 
                    header("location:postliste.php");
                    echo 'Vous avez modifié le fichier.';
                
            }
        
        if (isset($_GET['postmodif'])) {
            $modpost = unserialize(base64_decode($_GET['postmodif']));
            $datepost = $modpost->getDate();
            $postuser = $modpost->getAuteur();
            if (is_file('./posts/' . ($_SESSION['utilisateur']) . '/' . ($datepost->format('d-m-Y H:i:s')) . '.bin')) {
                ?>
                <form class="form-group" action="" method="POST">
                    <input type="hidden" value="<?php echo ($_GET['postmodif']) ?>" name="post">
                    <label for="disciplinepo">Discipline :</label><br>
                    <input class="form-control" id="disciplinepo" type="text" name="disciplinepo" value="<?php echo $modpost->getDiscipline(); ?>"/><br>
                    <label for="titrepo">Titre :</label><br>
                    <input class="form-control" id="titrepo" type="text" name="titrepo" value="<?php echo $modpost->getTitre(); ?>"/><br>
                    <input id="titrepohid" type="hidden" name="titrepohid" /><br>
                    <label for="tagspo">Mots-clés :</label><br>
                    <input class="form-control" id="tagspo" type="text" name="tagspo" value="<?php echo $modpost->getTags(); ?>"/><br>
                    <label for="commentpo">Commentaire :</label><br>
                    <textarea class="form-control" id="commentpo" name="commentpo" rows="4" cols="50"><?php echo $modpost->getContenu(); ?></textarea><br>
                    <input class="btn btn-default" type="submit" value="Modifier">
                </form>    
                <?php
            }
        }
        ?>
        <a href="postliste.php">Retour</a>
    </body>
</html>