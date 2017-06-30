<?php

include_once './Database.php';
include_once './Comment.php';

function createPost() {
            return new Post($_POST['commentp'], new DateTime, $_POST['pseudop'], $_POST['disciplinep'], $_POST['titrep'], $_POST['tagsp']);
        }

        Database::postCreate(createPost());

