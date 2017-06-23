<?php
$file = 'auth.json';
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
    }
?>
