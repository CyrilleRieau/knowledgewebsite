<?php
include_once 'header.php';

session_start();
if (!isset($_POST['coname']) || !isset($_POST['comdp'])) {
    echo 'Utilisateur inexistant.';
    exit(1);
}
if ($_POST['coname'] == "" && $_POST['comdp'] == "") {
    echo 'Utilisateur n\'est pas correct.';
    exit(1);
}
$coname = $_POST['coname'];
$comdp = md5($_POST['comdp']);
foreach (Database::recupUser() as $user) {
    if (($user->getPseudo() == $coname || $user->getMail() == $coname) && $user->getPassword() == $comdp) {
        $_SESSION['utilisateur'] = $coname;
        //echo 'Bonjour ' . htmlspecialchars($_SESSION['utilisateur']) . ', vous êtes bien connecté.';
        //echo '<form method="POST" action=""><button class = "logout">Deconnexion</button></form>';
        //echo '</section>';
        //echo 'Vous êtes bien connecté ' . htmlspecialchars($_SESSION['utilisateur']) . '.';
        //echo '<form method="POST" action="logout.php"><button>Deconnexion</button></form>';
        header('location: index.php');
    }
}
echo 'Les identifiants ne sont pas corrects.';
echo '<a href="index.php">Retour</a>';
/* $file = 'auth.json';
  $json = file_get_contents($file);
  $obj = json_decode($json);
  $user=$_POST['user'];
  $pwd=$_POST['pass'];
  $mdphach = md5($pwd);
  foreach ($obj as $u){
  if (!isset($u)) {
  $object = [
  "user" => $user,
  "password" => $mdphach
  ];
  $createtabjson = json_encode($object);
  //file_put_contents('auth.json', $createtabjson);
  //array_push($obj, $createtabjson);
  echo 'Création d\'un nouvel utilisateur';
  } else {
  if ($u->user === $user) {
  echo "Utilisateur dejà existant.";
  } else {
  $object = [
  "user" => $user,
  "password" => $mdphach
  ];
  $createtabjson = json_encode($object);
  array_push($file, $createtabjson);
  echo 'Création d\'un nouvel utilisateur';
  echo 'Not good bro !';
  }
  };
  if ($u->user === $user && $u->password === $mdphach) {
  echo 'C\'est ok !';
  } else {
  echo 'Nope, not correct.';
  }
  } */
/* include_once './User.php';
  if (!isset($_POST['coname']) || !isset($_POST['comdp'])) {
  echo 'Utilisateur inexistant.';
  exit(1);
  }
  if ($_POST['coname'] == "" && $_POST['comdp'] == "") {
  echo 'Utilisateur n\'est pas correct.';
  exit(1);
  }
  $coname = $_POST['coname'];
  $comdp = md5($_POST['comdp']);
  var_dump($comdp);
  var_dump($coname);
  //Créer une méthode avec 2 arguments qui reprend tout ce qui est en dessous et la mettre dans database pour aviter le sproblemes de boucle
  if (is_file('./users/users.txt')) {
  $content = file_get_contents('./users/users.txt');
  $unsercontent = unserialize($content);
  var_dump($unsercontent);
  foreach ($unsercontent as $user) {
  if (($user->getPseudo() == $coname || $user->getMail() == $coname) && $user->getPassword() == $comdp) {
  session_start();
  $_SESSION['utilisateur'] = $coname;
  echo 'Vous êtes bien connecté.';
  header('location: index.php');
  } else {
  echo 'Le mot de passe ou l\'utilisateur/mail n\'est pas bon';
  }
  }
  }

  //

 */
?>
<!--<a href="index.php">Retour</a>
