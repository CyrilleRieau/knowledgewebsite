<?php

include_once './Database.php';
include_once './Comment.php';

function createPost() {
            return new Post($_POST['commentp'], new DateTime, $_POST['pseudop'], $_POST['disciplinep'], $_POST['titrep'], $_POST['tagsp']);
        }

        Database::postCreate(createPost());
        


if (!isset($_POST['pseudop']) || !isset($_POST['disciplinep']) || !isset($_POST['titrep'])|| !isset($_POST['tagsp'])|| !isset($_POST['commentp'])) {
    echo 'Post inexistant.';
    exit(1);
}
if ($_POST['pseudop'] == "" || $_POST['disciplinep'] == "" || $_POST['titrep']=="" || $_POST['tagsp']=="" || $_POST['commentp']=="") {
    echo 'Post non complet.';
    exit(1);
}
$namepo = $_POST['pseudop'];
$discipo = $_POST['disciplinep'];
$titpo = $_POST['titrep'];
$tagpo = $_POST['tagsp'];
$commpo = $_POST['commentp'];
if (is_file('./posts/'.$_POST['pseudop'].'/'.$post->getDate() /*Problème ici*/.'.bin')) {
    $content = file_get_contents('./posts/'.$_POST['pseudop'].'/'.$post->getDate() .'.bin');
    $unsercontent = unserialize($content);
    
    foreach ($unsercontent as $post) {
        if ($post->getPseudo() == $namepo && $post->getDiscipline() == $discipo && $post->getTitre() == $titpo && $post->getTags() == $tagpo && $post->getContenu() == $commpo) {
            $_SESSION['utilisateurpo'] = $namepo;
            $_SESSION['discipo'] = $discipo;
            $_SESSION['titpo'] = $titpo;
            $_SESSION['tagpo'] = $tagpo;
            $_SESSION['commpo'] = $commpo;
            $_SESSION['datepo'] = $post->getDate();
        }
    }
}
header('location:index.php');