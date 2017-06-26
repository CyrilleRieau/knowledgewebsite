<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author rieau
 */
include_once'./User.php';
include_once'./creationuser.php';

class Database {

    //function Crud();
    //Ecrit et lit depuis disque;
    //save user() et load user();
    
    function __construct(User $user) {
        $this-> user = $user;
    }

    
    public function userCreate() {
        $user = new User($_SESSION['pseudo'], $_SESSION['bio'], $_SESSION['avatar'], $_SESSION['age'], $_SESSION['mail'], md5($_SESSION['pass']));
        $file = fopen('./users/' . $_SESSION['pseudo'] . '.txt', 'w');
        fwrite($file, serialize($user));
        fclose($file);
        echo '<p>Compte créé.</p>';
    }

    public function getUser() {
        $files = scandir('./users');
        foreach($files as $file) {
            $user = file_get_contents($file);
           return $useru = unserialize($user);
        }
        /* foreach($user as $u) {
          if (!isset($u)) {
          User::class($u);
          }
          } */
    }

}
