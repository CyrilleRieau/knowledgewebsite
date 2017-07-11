<?php
session_start();
if (isset($_SESSION['user'])) {
    echo 'Bonjour ' . htmlspecialchars($_SESSION['user']);
    echo '<form method="POST" action="logout.php"><button>Deconnexion</button></form>';
} else {
    ?>
    <form method="POST" action="inscription.php">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp">
        <input class="btn btn-default" type="submit" value="Inscription">
    </form>
    <form method="POST" action="login.php">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp">
        <input class="btn btn-default" type="submit" value="Connexion">
    </form>

    <?php
}
?>
