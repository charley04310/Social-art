<?php
require('../modele/dbConnect.php');


// fonction de test DATA (anti-hack)
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// On initialise les variables d'enregistrement

$pseudo = test_input($_POST['AddUsername']);
$email = test_input($_POST['AddEmail']);
$erreur = array();

// Hachage du mot de passe
$pass_hache = $_POST['AddPassword'];
$pass_confirmation_hache = $_POST['ConfirmationPassword'];


// On vérifie si le nom existe dans la base de donée

if (isset($pseudo)) {
    $req = $conn->prepare("SELECT * FROM Utilisateurs WHERE Pseudo_Users=?");
    $req->execute([$pseudo]);
    $user = $req->fetch();
   

    if ($user == false) {

        $req = $conn->prepare("SELECT * FROM Utilisateurs WHERE Email_Users=?");
        $req->execute([$email]);
        $user_email = $req->fetch();
        //$row = $user_email->rowCount();

        if ($user_email == false) {
            // on verifie si l'email est valide avec une fonction de filtre 
            if (filter_var($_POST['AddEmail'], FILTER_VALIDATE_EMAIL)) {

                // On verifie la confirmation de mot de pase 
                if ($pass_hache == $pass_confirmation_hache) {

                    $pass_hache = password_hash($_POST['AddPassword'], PASSWORD_DEFAULT);
                    // On verifie que les conditions generals ont été validé
                    if (isset($_POST['conditions'])) {

                        // On prépare la requete
                        $req = $conn->prepare("INSERT INTO Utilisateurs(Pseudo_Users, Mdp_Users, Email_Users, Id_Permission) 
                            VALUES (?, ?, ?, ?)");
                        // on place les variables dans les champs de la BDD
                        $inf_user = array(
                            $pseudo, $pass_hache, $email, 1,
                        );
                        // ON EXECUTE LA REQUETE
                        $req->execute($inf_user);
                        // On redirige vers une page "user"
                        echo'succes papa';

                    } else {
                        header('Location:../inscription.php?reg_err=conditionWrong');
                    }
                } else {
                    header('Location:../inscription.php?reg_err=passwordWrong');
                }
            } else {
                header('Location:../inscription.php?reg_err=emailWrong');
            }
        } else {
            header('Location:../inscription.php?reg_err=emailTaken');
        }
    } else {
        header('Location:../inscription.php?reg_err=usernameTaken');
    }
} else {
    header('Location:../inscription.php?reg_err=usernameEmpty');
}
