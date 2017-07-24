<?php

//use DateTime;

/*function myLoader($className) {
    $class = str_replace('\\', '/', $className);
    require($class . '.php');
}

spl_autoload_register('myLoader');
*/
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
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function userCreate(User $user): bool {
//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

        $userCre = $this->pdo->prepare('INSERT INTO user(pseudo, bio, avatar, age, mail, password) VALUES (:pseudo, :bio, :avatar, :age, :mail, :password)');
        $userCre->bindValue('pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $userCre->bindValue('bio', $user->getBio(), PDO::PARAM_STR);
        $userCre->bindValue('avatar', $user->getAvatar(), PDO::PARAM_LOB);
        $userCre->bindValue('age', $user->getAge());
        $userCre->bindValue('mail', $user->getMail(), PDO::PARAM_STR);
        $userCre->bindValue('password', $user->getPassword(), PDO::PARAM_STR);

        if ($userCre->execute()) {
            $user->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }

    /* public static function logUser() {
      if (isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass'])) {
      $_SESSION['utilisateur'] = $_POST['pseudo'];
      echo 'Bonjour ' . htmlspecialchars($_SESSION['utilisateur']) . ', vous êtes bien connecté.';
      echo '<form method="POST" action=""><button class = "logout">Deconnexion</button></form>';
      }
      }
     */

    public function commentCreate(Comment $comment): bool {
        $comCre = $this->pdo->prepare('INSERT INTO comment(contenu, date, auteur) VALUES (:contenu, :date, :auteur)');
        $comCre->bindValue('contenu', $comment->getContenu(), PDO::PARAM_STR);
        $comCre->bindValue('date', $comment->getDate(), PDO::PARAM_STR);
        $comCre->bindValue('auteur', $comment->getAuteur(), PDO::PARAM_STR);
        if ($comCre->execute()) {
            $comment->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }

//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

    /* if (!is_dir('./comment')) {
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

      } */


    public function postCreate(Post $post): bool {
        $postCre = $this->pdo->prepare('INSERT INTO post(contenu, date, auteur, discipline, titre, tags) VALUES (:contenu, :date, :auteur, :discipline, :titre, :tags)');
        $postCre->bindValue('contenu', $post->getContenu(), PDO::PARAM_STR);
        $postCre->bindValue('date', $post->getDate()->format('Y-m-d'), PDO::PARAM_STR);
        $postCre->bindValue('auteur', $post->getAuteur(), PDO::PARAM_STR);
        $postCre->bindValue('discipline', $post->getDiscipline(), PDO::PARAM_STR);
        $postCre->bindValue('titre', $post->getTitre(), PDO::PARAM_STR);
        $postCre->bindValue('tags', $post->getTags(), PDO::PARAM_STR);
        if ($postCre->execute()) {
            $post->setId(intval($this->pdo->lastInsertId()));
            return true;
        }
        return false;
    }

//        if (!is_file('./users/users.txt')) { RAjouter tableau ou donnees seront stockees et serialize ensuite après ajout

    /* if (!is_dir('./posts')) {
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
      } */


    public function recupPost() {
        $recupPost = $this->pdo->query('SELECT * FROM post');
        $posts = [];
        while ($ligne = $recupPost->fetch()) {
            $post = new Post($ligne['contenu'], $ligne['date'], $ligne['auteur'], $ligne['discipline'], $ligne['titre'], $ligne['tags']);
            $posts[] = $post;
        }
        return $posts;
    }

    /* $tab = [];
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
      } */

    public function recupUser() {

        $recupUser = $this->pdo->query('SELECT * FROM user');
        $users = [];
        while ($ligne = $recupUser->fetch()) {
            $user = new User($ligne['pseudo'], $ligne['bio'], $ligne['avatar'], $ligne['age'], $ligne['mail'], $ligne['password']);
            $users[] = $user;
        }
        return $users;
    }

    /* if (is_file('./users/users.bin')) {
      $content = file_get_contents('./users/users.bin');
      $unsercontent = unserialize($content);
      return $unsercontent;
      }
      } */

    public function recupComment() {

        $recupComment = $this->pdo->query('SELECT * FROM comment');
        $comments = [];
        while ($ligne = $recupComment->fetch()) {
            $comment = new Comment($ligne['contenu'], $ligne['date'], $ligne['auteur']);
            $comments[] = $comment;
        }
        return $comments;
    }

    /* $tab = [];
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
     */

    public function modifCom(Comment $comment): bool {
        $modifCom = $this->pdo->prepare('UPDATE comment SET contenu=:contenu, date=:date, auteur=:auteur WHERE id=:id');
        $modifCom->bindValue('contenu', $comment->getContenu(), PDO::PARAM_STR);
        $modifCom->bindValue('date', $comment->getDate()->format('Y-m-d'), PDO::PARAM_STR);
        $modifCom->bindValue('auteur', $comment->getAuteur(), PDO::PARAM_STR);
        if ($modifCom->execute()) {
            return true;
        }
        return false;
    }

    /* if (is_file('./comment/' . ($post->getDate()->format('d-m-Y H:i:s')) . '/' . ($anciencom->getDate()->format('d-m-Y H:i:s'))) . '.bin') {
      }
      }
      $file = fopen('./comment/' . ($post->getDate()->format('d-m-Y H:i:s')) . '/' . ($anciencom->getDate()->format('d-m-Y H:i:s')) . '.bin', 'w+');
      fwrite($file, serialize($com));
      fclose($file);
      }
      } */

    public function modifPost(Post $post): bool {
        $modifPost = $this->pdo->prepare('UPDATE comment SET contenu=:contenu, date=:date, auteur=:auteur, discipline=:discipline, titre=:titre, tags=:tags WHERE id=:id');
        $modifPost->bindValue('contenu', $post->getContenu(), PDO::PARAM_STR);
        $modifPost->bindValue('date', $post->getDate()->format('Y-m-d'), PDO::PARAM_STR);
        $modifPost->bindValue('auteur', $post->getAuteur(), PDO::PARAM_STR);
        $modifPost->bindValue('discipline', $post->getDiscipline(), PDO::PARAM_STR);
        $modifPost->bindValue('titre', $post->getTitre(), PDO::PARAM_STR);
        $modifPost->bindValue('tags', $post->getTags(), PDO::PARAM_STR);
        if ($modifPost->execute()) {
            return true;
        }
        return false;
    }

    /* if (is_file('./posts/' . $user . '/' . ($ancienpost->getDate()->format('d-m-Y H:i:s'))) . '.bin') {
      $file = fopen('./posts/' . $user . '/' . ($ancienpost->getDate()->format('d-m-Y H:i:s')) . '.bin', 'w+');
      fwrite($file, serialize($post));
      fclose($file);
      }
      } */

    public function modifUser(User $user) {
        $modifUser = $this->pdo->prepare('UPDATE comment SET pseudo=:pseudo, bio=:bio, avatar=:avatar, age=:age, mail=:mail, password=:password WHERE id=:id');
        $modifUser->bindValue('pseudo', $user->getPseudo(), PDO::PARAM_STR);
        $modifUser->bindValue('bio', $user->getBio(), PDO::PARAM_STR);
        $modifUser->bindValue('avatar', $user->getAvatar(), PDO::PARAM_LOB);
        $modifUser->bindValue('age', $user->getAge(), PDO::PARAM_INT);
        $modifUser->bindValue('mail', $user->getMail(), PDO::PARAM_STR);
        $modifUser->bindValue('password', $user->getPassword(), PDO::PARAM_STR);
        if ($modifUser->execute()) {
            return true;
        }
        return false;
    }

    /* $users = Database::recupUser();
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
     */

    public function deleteUser(User $user):bool {
        $deleteUser=$this->pdo->prepare('DELETE FROM user WHERE id=:id');
        $deleteUser->bindValue('id', $user->getId(), PDO::PARAM_INT);
        return $deleteUser->execute();
    }
        
        /*$y = unserialize(base64_decode($post));
    }
    }
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
    }*/

    public function deletePost(Post $post):bool {
        $deletePost=$this->pdo->prepare('DELETE FROM post WHERE id=:id');
        $deletePost->bindValue('id', $post->getId(), PDO::PARAM_INT);
        return $deletePost->execute();
    }
    
    public function deleteComment(Comment $comment):bool {
        $deleteComment=$this->pdo->prepare('DELETE FROM comment WHERE id=:id');
        $deleteComment->bindValue('id', $comment->getId(), PDO::PARAM_INT);
        return $deleteComment->execute();
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