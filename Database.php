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
include_once './User.php';
include_once './Comment.php';
include_once './Post.php';
session_start();

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
            } else {
                $datas = file_get_contents('./users/users.bin');
                $useruns = unserialize($datas);
                $file = fopen('./users/users.bin', 'w+');
                array_push($useruns, $user);
                fwrite($file, serialize($useruns));
                fclose($file);
            }
        }
    }

    /* public static function logUser() {
      if (isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass'])) {
      $_SESSION['utilisateur'] = $_POST['pseudo'];
      echo 'Bonjour ' . htmlspecialchars($_SESSION['utilisateur']) . ', vous êtes bien connecté.';
      echo '<form method="POST" action=""><button class = "logout">Deconnexion</button></form>';
      }
      }
     */

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

    public static function commentCreate(Comment $comment, Post $post) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

        if (!is_dir('./comment')) {
            mkdir('./comment');
        }if (!is_dir('./comment/' . $post->getDate()->format('d-m-Y H:i:s'))) {
            mkdir('./comment/' . $post->getDate()->format('d-m-Y H:i:s'));


            $d = new DateTime();
            $file = fopen('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');

            fwrite($file, serialize($comment));
            fclose($file);
            echo '<p>Commentaire créé.</p>';
        } else {
//$d->format('Y-m-d H:i:s');
            $d = new DateTime();
            if (!is_file('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                $file = fopen('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');
                fwrite($file, serialize($comment));
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

    public static function postCreate(Post $post) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

        if (!is_dir('./posts')) {
            mkdir('./posts');
        }if (!is_dir('./posts/' . $_SESSION['utilisateur'])) {
            mkdir('./posts/' . $_SESSION['utilisateur']);

            $d = $post->getDate();
            $file = fopen('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');
            fwrite($file, serialize($post));
            fclose($file);
            echo '<p>Post créé.</p>';
        } else {

            $d = $post->getDate();
//$d->format('Y-m-d H:i:s');

            if (!is_file('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                $file = fopen('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');
                fwrite($file, serialize($post));
                fclose($file);
                echo '<p>Post créé.</p>';
            }
        }
    }

    public static function recupPost() {
        $tab = [];
        if (is_dir('./posts')) {
            $users = scandir('./posts');
            $users = array_diff($users, ['..', '.']);
            foreach ($users as $user) {
//$datas = unserialize($comment);
                $postuser = scandir('./posts/' . $user);
                $postuser = array_diff($postuser, ['..', '.']);

                foreach ($postuser as $post) {
                    if (!is_dir('./posts/' . $user . '/' . $post)) {
                        $seripost = file_get_contents('./posts/' . $user . '/' . $post);
                        $unserpost = unserialize($seripost);
                        array_push($tab, $unserpost);
                    }
                }
            }
        }
        return $tab;
    }

    public static function recupUser() {
        
        if (is_file('./users/users.bin')) {
            $content = file_get_contents('./users/users.bin');
            $unsercontent = unserialize($content);
        return $unsercontent;
            
        }
    }

    /*  public static function logout() {
      if (isset($_SESSION['utilisateur'])) {
      $_SESSION = [];
      session_destroy();
      header('location : index.php');
      echo 'Vous êtes déconnecté.';
      }
      }

      public static function login() {


      echo '<script> let logou = document.querySelector(".logout");
      logou.addEventListener("click", function () {';
      echo '<?php Database::logout(); ?>';
      echo '});</script>';
      }
     */
}

//}
//}
//}

/* public static function formlog() {
  echo '<h1>Connectez-vous </h1>
  <form action="" method="POST" >
  <label for="coname">Pseudo ou Mail:</label><br>
  <input id="coname" type="text" name="coname" /><br>
  <br>
  <label for="comdp">Mot de Passe :</label><br>
  <input id="comdp" type="password" name="comdp" /><br>
  <input type="submit" value="Send">
  </form>
  </section>';
  } */

//}
//
//header('location:index.php');
//echo '<p>Compte créé.</p>';