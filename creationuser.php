<?php
include_once'./User.php';
$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$pass = htmlspecialchars($_POST['pass']);
$passhach = md5($pass);
$bio = htmlspecialchars($_POST['bio']);
$age = htmlspecialchars($_POST['age']);
$avatar = htmlspecialchars($_POST['avatar']);

if (!is_dir('./users')) {
    mkdir('./users');
    if (is_file('./users/' . $user . '.txt')) {
        serialize($user);
    } else {
        $user = new User($pseudo, $bio, $avatar, $age, $mail, $passhach);

        $userser = serialize($user);
//serialize et unserialize
        $file = fopen('./users/' . $pseudo . '.txt', 'w');
        fwrite($file, $userser);
        fclose($file);
        echo '<p>Compte créé.</p>';
    }
}

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