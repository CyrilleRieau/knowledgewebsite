<?php
//use DateTime;
use entities\Comment;
use entities\Post;
use entities\User;
//use PDO;

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

//try {
//$query = $db->query('SELECT * FROM ??');
//echo $query->fetch()['name'].' ';
//$chiens = [];
/* while ($ligne = $query->fetch()) {
  $chien = new entities\SmallDoggo($ligne['name'], $ligne['race'], new DateTime(), false);
  array_push($chiens, $chien);
  }
  var_dump($chiens);
  } catch (PDOException $exception) {
  echo $exception->getMessage();
  }
 */

class Database {

//function Crud();
//Ecrit et lit depuis disque;
//save user() et load user();

    private $pdo;

    function __construct() {
        $this->pdo = new PDO('mysql:host=localhost;dbname=event_db', 'cyrille', 'mdp');
    }

    public static function userCreate(User $user) {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

$db = new Database();
        $userCre = $db->prepare('INSERT INTO user(pseudo, bio, avatar, age, mail, password) VALUES (:pseudo, :bio, :avatar, :age, :mail, :password)');
        $userCre->bindParam('pseudo', $user->$pseudo, PDO::PARAM_STR, 64);
        $userCre->bindParam('bio', $user->$bio, PDO::PARAM_STR, 64);
        $userCre->bindParam('avatar', $user->$avatar, PDO::PARAM_LOB);
        $userCre->bindParam('age', $user->$age);
        $userCre->bindParam('mail', $user->$mail, PDO::PARAM_STR, 128);
        $userCre->bindParam('password', $user->$password, PDO::PARAM_STR, 1024);
        $userCre->execute();
    }

    /* public static function logUser() {
      if (isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass'])) {
      $_SESSION['utilisateur'] = $_POST['pseudo'];
      echo 'Bonjour ' . htmlspecialchars($_SESSION['utilisateur']) . ', vous êtes bien connecté.';
      echo '<form method="POST" action=""><button class = "logout">Deconnexion</button></form>';
      }
      }
     */

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
        } else {
//$d->format('Y-m-d H:i:s');
            $d = new DateTime();
            if (!is_file('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                $file = fopen('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');
                fwrite($file, serialize($comment));
                fclose($file);
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
            //echo '<p>Post créé.</p>';
        } else {

            $d = $post->getDate();
//$d->format('Y-m-d H:i:s');

            if (!is_file('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin')) {
                $file = fopen('./posts/' . $_SESSION['utilisateur'] . '/' . ($d->format('d-m-Y H:i:s')) . '.bin', 'w+');
                fwrite($file, serialize($post));
                fclose($file);
                //echo '<p>Post créé.</p>';
            }
        }
    }

    public function recupPost() {
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

    public static function recupContent($post) {
        $tab = [];
        if (is_dir('./comment/' . $post->getDate()->format('d-m-Y H:i:s'))) {
            $commentss = scandir('./comment/' . $post->getDate()->format('d-m-Y H:i:s'));
            $commentss = array_diff($commentss, ['..', '.', '.txt']);
            foreach ($commentss as $comments) {

                // if (is_dir('./comment/' . $comments)) {
                //$datas = unserialize($comment);
                //        $comtuser = scandir('./comment/' . $comments);
                //      $comtuser = array_diff($comtuser, ['..', '.']);
                //    foreach ($comtuser as $comt) {
                //      if (!is_dir('./comment/' . $comments . '/' . $comt)) {

                $sericomt = file_get_contents('./comment/' . $post->getDate()->format('d-m-Y H:i:s') . '/' . $comments);
                $unsercomt = unserialize($sericomt);
                array_push($tab, $unsercomt);
            }
        }
        return $tab;
    }

    public static function modifCom(Comment $com, Comment $anciencom, Post $post) {
        if (is_file('./comment/' . ($post->getDate()->format('d-m-Y H:i:s')) . '/' . ($anciencom->getDate()->format('d-m-Y H:i:s'))) . '.bin') {
            $file = fopen('./comment/' . ($post->getDate()->format('d-m-Y H:i:s')) . '/' . ($anciencom->getDate()->format('d-m-Y H:i:s')) . '.bin', 'w+');
            fwrite($file, serialize($com));
            fclose($file);
        }
    }

    public static function modifPost($user, Post $ancienpost, Post $post) {
        if (is_file('./posts/' . $user . '/' . ($ancienpost->getDate()->format('d-m-Y H:i:s'))) . '.bin') {
            $file = fopen('./posts/' . $user . '/' . ($ancienpost->getDate()->format('d-m-Y H:i:s')) . '.bin', 'w+');
            fwrite($file, serialize($post));
            fclose($file);
        }
    }

    public static function modifUser(User $olduser, User $newuser) {
        $users = Database::recupUser();
        foreach ($users as $key => $user) {
            if ($olduser->getPseudo() == $user->getPseudo()) {
                array_splice($users, $key);
            }
        }
        $file = fopen('./users/users.bin', 'w+');
        array_push($users, $newuser);
        fwrite($file, serialize($users));
        fclose($file);
    }

    public static function deleteUser($post) {
        $y = unserialize(base64_decode($post));
        $users = Database::recupUser();

        foreach ($users as $key => $user) {
            if ($y->getPseudo() == $user->getPseudo()) {
                array_splice($users, $key);
            }
        }
        $file = fopen('./users/users.bin', 'w+');
        fwrite($file, serialize($users));
        fclose($file);

        $_SESSION = [];
        session_destroy();
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
  } 

//}
//
//header('location:index.php'); */