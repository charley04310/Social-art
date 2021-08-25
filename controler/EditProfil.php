<?php 
session_start();
require('../modele/dbConnect.php');


$email = $_POST['EditEmail'];
$description = $_POST['EditBio'];
$nationality = $_POST['EditNatio'];
$avatar = $_FILES['EditAvatar'];


if (filter_var($email, FILTER_VALIDATE_EMAIL)){

    if(strlen($description) < 250){

        if(strlen($nationality) < 15){

            if(isset($_FILES['EditAvatar']) && !empty($_FILES['EditAvatar']['name'])){

                $tailleMax = 2097152;
                $entensionValide = array('jpg', 'png', 'jpeg');

                if($_FILES['EditAvatar']['size'] <= $tailleMax){

                    $exentionUpload = strtolower(substr(strrchr($_FILES['EditAvatar']['name'], '.'), 1));
                    if(in_array($exentionUpload, $entensionValide)){

                    $chemin = "../img/avatars/".$_SESSION['id_user'].".".$exentionUpload;
                    $resultat = move_uploaded_file($_FILES['EditAvatar']['tmp_name'], $chemin);

                        if($resultat){
                            $req = $conn->prepare("UPDATE Utilisateurs SET Bio_Users=?, Natio_Users=?, Email_Users=?, Avatar_Users=? WHERE Id_Users=?");
                            // on place les variables dans les champs de la BDD
                            $inf_poste = array($description, $nationality, $email, substr($chemin, 3), $_SESSION['id_user']);
                            // ON EXECUTE LA REQUETE
                            $req->execute($inf_poste);
                            // On redirige vers une page "user"
                            header('Location:http://localhost:8888/social\'art/Social-art/profil.php?profil='.$_SESSION['id_user'].'?EditProfil=succes');
                        }else{

                        }
    
                    
                    }else{
                    echo 'erreur lors du chargement de votre image';
                    }

                }else{

                }

            }else{



                echo 'aucune image ajouté' ;
            }

        }else{
            echo 'nom de pays trop grand';
        }

    }else{
        echo 'votre description est trop longue ';
    }

}else{
    echo 'mail non valide';
}



?>