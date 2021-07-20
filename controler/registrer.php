<?php 
// Vérification de la validité des informations

    $servername = "localhost";
    $username = "root";
    $password = "root";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=SocialArt", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connexion Réussie";



// Hachage du mot de passe
$pseudo = $_POST['AddUsername'];
$email = $_POST['AddEmail'];
$condition_utilisation = false;

$pass_hache = password_hash($_POST['AddPassword'], PASSWORD_DEFAULT);
$pass_confirmation_hache = password_hash($_POST['ConfirmationPassword'], PASSWORD_DEFAULT);




// Insertion
$req = $conn->prepare("INSERT INTO Utilisateurs(Pseudo_Users, Mdp_Users, Email_Users, Id_Permission) 
VALUES (?, ?, ?, ?)");

$inf_user = array(
     $pseudo,$pass_hache,$email,1,
);

$req->execute($inf_user);


    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    header('location:index.php');
    
    



