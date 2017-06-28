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

        if (!is_dir('./users')) {
            mkdir('./users');
        } else {

            $tab = [];
            if (!is_file('./users/users.bin')) {
                $file = fopen('./users/users.bin', 'w+');
                array_push($tab, $user);
                fwrite($file, serialize($tab));
                fclose($file);
                echo '<p>Compte créé.</p>';
            } else {
                $datas = file_get_contents('./users/users.bin');
                $useruns = unserialize($datas);
                $file = fopen('./users/users.bin', 'w+');
                array_push($useruns, $user);
                fwrite($file, serialize($useruns));
                fclose($file);
                echo '<p>Compte créé.</p>';
            }
        }
    }

    public function getUser() {
        $file = ('./users/users.bin');
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

    public static function commentCreate($comment) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

        if (!is_dir('./comment')) {
            mkdir('./comment');
        } else {
            $tab = [];
            $d = new DateTime();
            //$d->format('Y-m-d H:i:s');

            if (!is_file('./comment/' . $_POST['pseudo'] . '_' . ($d->format('Y-m-d H:i:s')).'.bin')) {
                $file = fopen('./comment/' . $_POST['pseudo'] . '_' . ($d->format('Y-m-d H:i:s')). '.bin', 'w+');
                array_push($tab, $comment);
                fwrite($file, serialize($tab));
                fclose($file);
                echo '<p>Commentaire créé.</p>';
            }
            /* else {
              $datas = file_get_contents('./comment/'.$_POST['pseudo'].DateTime.'.txt');
              $commentuns = unserialize($datas);
              $file = fopen('./comment/'.$_POST['pseudo'].'.txt', 'w+');
              array_push($commentuns, $comment);
              fwrite($file, serialize($commentuns));
              fclose($file);
              echo '<p>Compte créé.</p>';
              }
             */
        }
    }

    public static function postCreate($post) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

        if (!is_dir('./posts')) {
            mkdir('./posts');
        } else {
            $tab = [];
            $d = new DateTime();
            //$d->format('Y-m-d H:i:s');

            if (!is_file('./posts/' . $_POST['pseudop'] . '_' . ($d->format('Y-m-d H:i:s')). '.bin')) {
                $file = fopen('./posts/' . $_POST['pseudop'] . '_' . ($d->format('Y-m-d H:i:s')).'.bin', 'w+');
                array_push($tab, $post);
                fwrite($file, serialize($tab));
                fclose($file);
                echo '<p>Post créé.</p>';
            }
        }
    }

}
