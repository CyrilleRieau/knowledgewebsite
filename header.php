<?php
session_start();
if (isset($_SESSION['user'])){
    echo 'Bonjour '.htmlspecialchars($_SESSION['user']);
   echo '<form method="POST" action="logout.php"><button>Deconnexion</button></form>';
} else {
?>
<form method="POST" action="inscription.php">
<label>Pseudo</label><input type="text" name="pseudo">
<label>Mot de passe</label><input type="password" name="mdp">
<button>Inscription</button>
</form>
<form method="POST" action="login.php">
<label>Pseudo</label><input type="text" name="pseudo">
<label>Mot de passe</label><input type="password" name="mdp">
<button>Connexion</button>
</form>

<?php
} 
?>
