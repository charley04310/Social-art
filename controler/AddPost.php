<?php
session_start();
require('../modele/dbConnect.php');


    // on verifie les caracteres pour les injections JS (XSS)
    $titre_article = htmlspecialchars($_POST['AddTitle']);
    $categorie_article = htmlspecialchars($_POST['AddCategorie']);
    $description_article = htmlspecialchars($_POST['AddDesc']);
    $image_article = htmlspecialchars($_POST['AddDesc']);
    $username = $_SESSION['user'];
    $user_id = $_SESSION['id_user'];


  if(!empty($username)  && !empty($user_id)){

        if(strlen($titre_article) < 50){

            if($categorie_article === 'Développement' || $categorie_article === 'Illustration' || $categorie_article === 'Réseau' || $categorie_article === 'Cyber-Sécurité' || $categorie_article === 'Détente'){

                if(isset($_FILES['AddImg']) && !empty($_FILES['AddImg']['name'])){

                    $tailleMax = 2097152;
                    $entensionValide = array('jpg', 'png', 'jpeg');

                    if($_FILES['AddImg']['size'] <= $tailleMax){

                        $exentionUpload = strtolower(substr(strrchr($_FILES['AddImg']['name'], '.'), 1));
                        if(in_array($exentionUpload, $entensionValide)){

                            $chemin = "../img/articles/".str_replace(" ", "", $_POST['AddTitle']).$user_id.".".$exentionUpload;
                            $resultat = move_uploaded_file($_FILES['AddImg']['tmp_name'], $chemin);

                            if($resultat){
                                $req = $conn->prepare("INSERT INTO Postes(Titre_Poste, Cat_Poste, Desc_Poste, Id_Users, Img_Poste) 
                                VALUES (?, ?, ?, ?, ?)");
                                // on place les variables dans les champs de la BDD
                                $inf_poste = array(
                                $titre_article, $categorie_article, $description_article, $user_id, substr($chemin, 3));
                                // ON EXECUTE LA REQUETE
                                $req->execute($inf_poste);
                                // On redirige vers une page "user"
                                header("Location:http://localhost:8888/social'art/Social-art/index.php");
            
                            }else{
                                echo 'erreur lors du chargement du fichier';                       
                             }

                        }else{
                            echo 'votre image pas bon formart pas content';
                        }

                    }else{
                        echo 'le fortmat de votre image est trop lourd 2Mo max';
                    }
                    

                }else{

                    echo 'vous devez ajouter une image';

                }
            
            }else{
                echo'echec pas la bonne catégorie selectionné fdp de batard de merde';
            }


        }else{
            echo'trop long comme titre le sang';

        }

  }
 
