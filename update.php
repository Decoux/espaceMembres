<?php
  session_start();
  include 'connect_bdd.php';

  if (isset($_POST['update_pseudo'])) {
    if (!empty($_POST['update_pseudo'])) {
      $new_pseudo = htmlspecialchars($_POST['update_pseudo']);
      $req2 = $bdd->prepare('UPDATE membres SET pseudo = :pseudo WHERE pseudo = :up_pseudo');

      $req2->execute(array(':pseudo' => $new_pseudo,
                          ':up_pseudo' => $_SESSION['pseudo']));

      $_SESSION['pseudo'] = $new_pseudo;

      header('Location: nameSite.php');
    }else {
      echo "veuillez entrez un nouveau pseudo";
    }
  }

if (isset($_POST['update_mail'])) {
  if (!empty($_POST['update_mail'])) {
    if (preg_match("#^[a-z0-9-._]+@[a-z0-9-._]{2,}\.[a-z]{2,4}$#", $_POST['update_mail'] )){
      $new_email = htmlspecialchars($_POST['update_mail']);
      $req2 = $bdd->prepare('UPDATE membres SET email = :email WHERE email = :up_email');

      $req2->execute(array(':email' => $new_email,
                          ':up_email' => $_SESSION['email']));

      $_SESSION['email'] = $new_email;

      header('Location: nameSite.php');
    }else {
      echo "Le format de votre email est invalide";
    }
  }else {
    echo "veuillez entrez un nouveau email";
  }
}





?>
