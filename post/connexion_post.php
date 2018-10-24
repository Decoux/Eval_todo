<?php

include '../connect_bdd.php';
$req = $bdd->prepare('SELECT id, pass, name_user, firstname FROM users WHERE email = :email');
$req->execute(array(
    'email' => $_POST['email']
));

$resultat = $req->fetch();
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);


if ($resultat) {
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = ($resultat['id']);
        $_SESSION['name'] = $resultat['name_user'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['firstname'] = $resultat['firstname'];
        $_SESSION['id_user'] = intval($_SESSION['id']);

        header('Location:../index.php');

    } else {
        echo "Mot de passe ou pseudo invalide";
    }
} else {
    echo "Veuillez vous inscrire";
}
if ($_POST['connexion_auto'] == 'on') {
    setcookie('email', $_POST['email'], time() + 365 * 24 * 3600, null, null, false, true);
    setcookie('pass', password_hash($_POST['pass'], PASSWORD_DEFAULT), time() + 365 * 24 * 3600, null, null, false, true);
}
?>