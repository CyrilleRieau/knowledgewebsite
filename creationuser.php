<?php
include_once'./User.php';
include_once'./Database.php';

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
var_dump($_POST);
function createUser() {
   return new User($_POST['pseudo'], $_POST['bio'], $_POST['avatar'], $_POST['age'], $_POST['mail'], md5(htmlspecialchars($_POST['pass'])));
}

Database::userCreate(createUser());
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
<a href="index.php">Retour</a>