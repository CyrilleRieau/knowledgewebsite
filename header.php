<?php
include_once'./Post.php';
        include_once'./User.php';
        include_once'./Database.php';
        include_once'./Comment.php';
        $db = new Database();
        
        function myLoader($className){
    $class = str_replace('\\', '/', $className);
    require($class . '.php');
}

spl_autoload_register('myLoader');

use entities\User;
use entities\Comment;
use entities\Post;
