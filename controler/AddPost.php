<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=socialart", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


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


                $req = $conn->prepare("INSERT INTO Postes(Titre_Poste, Cat_Poste, Desc_Poste, Id_Users) 
                VALUES (?, ?, ?, ?)");
                // on place les variables dans les champs de la BDD
                $inf_poste = array(
                $titre_article, $categorie_article, $description_article, $user_id,
                );
                // ON EXECUTE LA REQUETE
                $req->execute($inf_poste);
                // On redirige vers une page "user"
                echo'succes papa';

            }else{
                echo'echec pas la bonne catégorie selectionné fdp de batard de merde';
            }


        }else{
            echo'trop long comme titre le sang';

        }

   

  }
 






        // On prépare la requete pour inserer l'article


