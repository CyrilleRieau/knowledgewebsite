<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Affichage Post</title>
    </head>
    
    <body>
        <?php
        
        include_once './Database.php';
        include_once './User.php';
        include_once './Comment.php';
        include_once './Post.php';
       
        
        if(isset($_GET['id'])) {
        $unserpost = unserialize(base64_decode($_GET['id'])); 
        ?>
        
                            <h1> <?php echo $unserpost->getTitre(); ?> </h1>
                            <p> <?php echo $unserpost->getContenu(); ?> </p>
                            <p> <?php echo $unserpost->getAuteur(); ?> </p>
                            <p> Tags : <?php echo $unserpost->getTags(); ?> </p>
                            <p> <?php echo $unserpost->getDate()->format('d-m-Y H:i:s'); ?> </p>
                        <?php
        }
        ?>
                            <a href="affichePost.php">Retour</a>             
    </body>
</html>
