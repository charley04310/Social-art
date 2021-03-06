<?php
session_start();
require('../modele/dbConnect.php');


if (isset($_POST['username']) && isset($_POST['password'])) {

    // on verifie les caracteres pour les injections JS (XSS)
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    //on prépare la requete
    $verification_Connexion = $conn->prepare('SELECT Id_Users, Pseudo_Users, Mdp_Users FROM Utilisateurs WHERE Pseudo_Users= ?');
    //On execute la requete avec le username pour verifier si il existe 
    $verification_Connexion->execute(array($username));
    // on enregistre les donnée dans la variable data 
    $data_login = $verification_Connexion->fetch();
    // On compte le nombre d'occurence trouvé

    //$row = $verification_Connexion->rowCount();
    // Si le pseudo a été trouvé on vérifie de mot de passe
    if ($data_login) {
       // $password = password_hash($password, PASSWORD_DEFAULT);

        if (password_verify($password, $data_login['Mdp_Users'])) {

            if(empty($_POST['conditions'])){


            $_SESSION['user'] = $data_login['Pseudo_Users'];
            $_SESSION['id_user'] = $data_login['Id_Users'];

          //  setcookie('pseudo', $username, 30);
           // setcookie('password', $password, 30);
        
            header('Location:../index.php?login=succes');

            }else{

                $_SESSION['user'] = $data_login['Pseudo_Users'];
                $_SESSION['id_user'] = $data_login['Id_Users'];
    
            setcookie('pseudo', $_SESSION['user']);
            setcookie('password', $password);
      

            header('Location:../index.php?login=succes?cookie=ok');    

            }

            } else{
        
            header('Location:../index.php?login_err=password');
        }
    } else {
        header('Location:../index.php?login_err=username');
    }
} else {
    header('Location:index.php?login_err=feed');
}