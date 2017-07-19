<?php

include_once 'header.php';



/* $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);
  $pass = htmlspecialchars($_POST['pass']);
  $passhach = md5($pass);
  $bio = htmlspecialchars($_POST['bio']);
  $age = htmlspecialchars($_POST['age']);
  $avatar = htmlspecialchars($_POST['avatar']);
 */

//if (!is_dir('./users')) {
//  mkdir('./users');
//if (is_file('./users/' . $user . '.txt')) {
//  serialize($user);
//} else {
/* foreach (Database::recupUser() as $user) {
  if ($user->getPseudo() == $_POST['pseudo'] && $user->getBio() == $_POST['bio'] && $user->getAvatar() == $_POST['avatar'] && $user->getAge() == $_POST['age'] && $user->getMail() == $_POST['mail'] && $user->getPassword() == md5(htmlspecialchars($_POST['pass']))) {
  echo 'Utilisateur déjà existant.';
  exit(1);
  }
 */


function createUser() {
    return new User($_POST['pseudo'], $_POST['bio'], $_POST['avatar'], $_POST['age'], $_POST['mail'], md5(htmlspecialchars($_POST['pass'])));
}

$db->userCreate(createUser());


if (!isset($_POST['pseudo']) || !isset($_POST['pass']) || !isset($_POST['mail'])) {
    echo 'Utilisateur inexistant.';
    exit(1);
}
if ($_POST['pseudo'] == "" && $_POST['pass'] == "" && $_POST['mail'] == "") {
    echo 'Utilisateur n\'est pas correct.';
    exit(1);
}
$coname = $_POST['pseudo'];
$comdp = md5(htmlspecialchars($_POST['pass']));
$comail = $_POST['mail'];

foreach ($db->recupUser() as $user) {
    if (($user->getPseudo() == $coname || $user->getMail() == $comail) && $user->getPassword() == $comdp) {
        $_SESSION['utilisateur'] = $coname;
    }
}

header('location:index.php');
//serialize et unserialize
//}
//}

/* $inp = file_get_contents("tweets/tweets.json");
  $tempArray = json_decode($inp);
  $tempArray->{$this->tweetnum}["pseudo"] = $this->pseudo;
  $tempArray->{$this->tweetnum}["message"] = $this->message;
  $tempArray->{$this->tweetnum}["avatar"] = $this->avatar;
  $tempArray->{$this->tweetnum}["retweets"] = $this->retweets;
  $tempArray->{$this->tweetnum}["likes"] = $this->likes;
  $tempArray->{$this->tweetnum}["date"] = $this->date;
  $jsonData = json_encode($tempArray);
  file_put_contents('tweets/tweets.json', $jsonData);
  }
 */
?>