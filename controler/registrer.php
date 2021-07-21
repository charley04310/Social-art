<?php 
// connection BDD

    $servername = "localhost";
    $username = "root";
    $password = "root";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=SocialArt", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       } 
      
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }


// fonction de test DATA (anti-hack)
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

// On initialise les variables

$pseudo = test_input($_POST['AddUsername']);
$email = test_input($_POST['AddEmail']);
$condition_utilisation = false;
$erreur = array();

// Hachage du mot de passe
$pass_hache = $_POST['AddPassword'];
$pass_confirmation_hache = $_POST['ConfirmationPassword'];


// On vérifie si le nom existe dans la base de donée
$req = $conn->prepare("SELECT * FROM Utilisateurs WHERE Pseudo_Users=?");
$req->execute([$pseudo]); 
$user = $req->fetch();

if ($user){
$erreur[0] = "Pseudo déja pris";
        } else{
            $pseudo = $pseudo;
            }
            
// on vérifie si l'email existe dans la base de donnée ! 
$req = $conn->prepare("SELECT * FROM Utilisateurs WHERE Email_Users=?");
$req->execute([$email]); 
$user_email = $req->fetch();

if ($user_email){
$erreur[1] = "L'Email que vous avez renseigné est déja pris";
        } else{
            $email = $email;
            }
// on verifie si l'email est valide avec une fonction de filtre 
if (!filter_var($_POST['AddEmail'], FILTER_VALIDATE_EMAIL)){
        $erreur[2] = "Votre email n'est pas valide";
} 
// On verifie la confirmation de mot de pase 
if($pass_hache == $pass_confirmation_hache){

   $pass_hache = password_hash($_POST['AddPassword'], PASSWORD_DEFAULT);
} else{
    $erreur[3] = "Votre Mot de Passe de confirmation est différent";

}

// On verifie que les conditions generals ont été validé
if(!isset($_POST['conditions'])){
    $erreur[4] = "Devez avoir pris connaissance des conditions générals d'utilisation pour valider votre inscription";
}

// si aucune erreur a été enregistré dans le tableaux alors on enregistre les data

if(empty($erreur)){

// Insertion
$req = $conn->prepare("INSERT INTO Utilisateurs(Pseudo_Users, Mdp_Users, Email_Users, Id_Permission) 
VALUES (?, ?, ?, ?)");

$inf_user = array(
     $pseudo,$pass_hache,$email,1,
);

$req->execute($inf_user);
echo 'felicitation vous êtes officiellement un membre de notre communauté';

}else{
    var_dump($erreur);
}



    



