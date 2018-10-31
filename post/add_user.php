<?php
include '../connect_bdd.php';
//prepare requete//
$req = $bdd->prepare('INSERT INTO users(firstname, name_user, pass, email, age) VALUES (:firstname, :name_user, :pass, :email, :age)');
//hash password//
$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//secure html charactere for all variable//
$pass = htmlspecialchars($_POST['pass']);
$pass_2 = htmlspecialchars($_POST['pass_2']);
$name_user = htmlspecialchars($_POST['name_user']);
$firstname = htmlspecialchars($_POST['firstname']);
$email = htmlspecialchars($_POST['email']);
//prepare requete for pseudo//
$req1 = $bdd->prepare("SELECT * FROM users WHERE name_user = :name_user AND firstname = :firstname");
$req1->execute(array(
    'name_user' => $name_user,
    'firstname' => $firstname
));
//if variable is set//
if (isset($name_user) and isset($firstname) and isset($pass)) {
  //if variable is not empty//
    if (!empty($name_user) and !empty($pass) and !empty($firstname)) {
    //if mail is valide using REGEX//
        if (preg_match("#^[a-z0-9-._]+@[a-z0-9-._]{2,}\.[a-z]{2,4}$#", $email)) {
      //if pseudo is already use//
            if ($req1->fetch() == false) {
                
        //if password is already use//
                if ($pass == $pass_2) {
                    
                $req->execute(array(
                    'firstname' => $firstname,
                    'name_user' => $name_user,
                    'pass' => $pass_hache,
                    'email' => $email,
                    'age' => $_POST['age']
                    
                ));
                    // echo "string";
                header('Location:../connexion.php');
                } else {
                    echo "les mots de passe sont differents";
                }
            } else {
            echo "le pseudo est deja utilisé";
            }
        } else {
        echo "l'adresse email n'est pas valide";
        }
    } else {
    echo "le champ du pseudo ou du mot est vide";
    }
} else {
echo "veuillez entrer un pseudo et un mot de passe";
}