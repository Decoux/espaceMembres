<?php
include 'connect_bdd.php';
$req = $bdd->prepare('SELECT id, pass, email, date_inscription,avatar FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $_POST['pseudo']));

$resultat = $req->fetch();
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);


if ($resultat) {
  if ($isPasswordCorrect) {
    session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['inscription'] = $resultat['date_inscription'];
        $_SESSION['avatar'] = $resultat['avatar'];

        header('Location:nameSite.php');

    }else {
    echo "Mot de passe ou pseudo invalide";
  }
}else {
  echo "Veuillez vous inscrire";
}
if ($_POST['connexion_auto'] == 'on') {
  setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);
  setcookie('pass', password_hash($_POST['pass'], PASSWORD_DEFAULT), time() + 365*24*3600, null, null, false, true);
}
?>
