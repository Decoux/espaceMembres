<?php
include 'connect_bdd.php';
//prepare requete//
$req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription, avatar) VALUES (:pseudo, :pass, :email, NOW(), :avatar)');
//hash password//
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//secure html charactere for all variable//
$pass = htmlspecialchars($_POST['pass']);
$pass_2 = htmlspecialchars($_POST['pass_2']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
//prepare requete for pseudo//
$req1 = $bdd -> prepare("SELECT * FROM membres WHERE pseudo = :pseudo");
$req1->execute(array(
        'pseudo'=>$pseudo
      ));
//if variable is set//
if (isset($pseudo) and isset($pass)) {
  //if variable is not empty//
  if (!empty($pseudo) and !empty($pass)) {
    //if mail is valide using REGEX//
    if (preg_match("#^[a-z0-9-._]+@[a-z0-9-._]{2,}\.[a-z]{2,4}$#", $email )){
      //if pseudo is already use//
      if ($req1->fetch() == FALSE) {
        //if password is already use//
        if ($pass == $pass_2) {
          // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur//
          if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] == 0){
            // Testons si le fichier n'est pas trop gros//
            if ($_FILES['avatar']['size'] <= 1000000){
                    // Testons si l'extension est autorisée//
                    $infosfichier = pathinfo($_FILES['avatar']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees)){
                            // On peut valider le fichier et le stocker définitivement//
                            move_uploaded_file($_FILES['avatar']['tmp_name'], 'img/' . basename($_FILES['avatar']['name']));
                            // echo "L'envoi a bien été effectué !";
                            $req->execute(array(
                                  'pseudo' => $pseudo,
                                  'pass' => $pass_hache,
                                  'email' => $email,
                                  'avatar' => $_FILES['avatar']['name']
                                  ));
                                  // echo "string";
                                  header('Location:index.php');
                              }else {
                                echo "le format du fichier n'est pas autorisé(jpg, jpeg, gif, png)";
                              }
                          }else {
                            echo "la taille du fichier est superieur a 1mo";
                          }
                      }else {
                        echo "probleme lors de l'envoi";
                      }
                  }else {
                  echo "les mots de passe sont differents";
                }
            }else {
              echo "le pseudo est deja utilisé";
            }
        }else {
          echo "l'adresse email n'est pas valide";
        }
    }else {
      echo "le champ du pseudo ou du mot est vide";
    }
}else {
  echo "veuillez entrer un pseudo et un mot de passe";
}









?>
