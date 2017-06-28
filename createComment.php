
        <?php

include_once'./User.php';
include_once'./Database.php';
include_once'./Comment.php';

function createComment() {
   return new Comment($_POST['comment'], new DateTime, $_POST['pseudo']);
   
}
Database::commentCreate(createComment());
?>
<a href="index.php">Retour</a>
