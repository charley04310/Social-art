<?php 
//  Récupération de l'utilisateur et de son pass hashé
$servername = "localhost";
$username = "root";
$password = "root";

try {
  $conn = new PDO("mysql:host=$servername;dbname=SocialArt", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
$pseudo = '';
$req = $conn->prepare('SELECT Pseudo_Users, Mdp_Users FROM Utilisateurs');
$req -> execute(array(
    'Pseudo_Users' => $pseudo

));

$resultat = $req->fetch();

var_dump($resultat);

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['password'], $resultat['Mdp_Users']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}
  