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

class Database {

//function Crud();
//Ecrit et lit depuis disque;
//save user() et load user();





    public static function userCreate($user) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout


        $tab = [];
        if (!is_file('./users/users.txt')) {
            $file = fopen('./users/users.txt', 'w+');
            array_push($tab, $user);
            var_dump($tab);
            fwrite($file, serialize($tab));
            fclose($file);
            echo '<p>Compte créé.</p>';
        } else {
            $datas = file_get_contents('./users/users.txt');
            $useruns = unserialize($datas);
            $file = fopen('./users/users.txt', 'w+');
            array_push($useruns, $user);
            var_dump($tab);
            fwrite($file, serialize($useruns));
            fclose($file);
            echo '<p>Compte créé.</p>';
        }
    }

    public function getUser() {
        $file = ('./users/users.txt');
        /* for {
          $user = file_get_contents($file);
          return $useru = unserialize($user);
          } */
        /* foreach($user as $u) {
          if (!isset($u)) {
          User::class($u);
          }
          } */
    }

}
