<?php

include_once'./Database.php';

function myLoader($className) {
    $class = str_replace('\\', '/', $className);
    require($class . '.php');
}

spl_autoload_register('myLoader');

use entities\User;
use entities\Comment;
use entities\Post;

$db = new Database();

