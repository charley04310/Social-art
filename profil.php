<?php
$title_page = 'Page profil';
$title_post = ' TOUTES VOS PUBLICATIONS';
require('view/header.php');

require('view/modal_connexion.php');

if(isset($_GET['profil'])){
    $ReqdataName = $conn->prepare('SELECT Pseudo_Users, Email_Users, Bio_Users FROM Utilisateurs WHERE Id_Users =?');
    $ReqdataName->execute(array($_GET['profil']));
    $dataName = $ReqdataName->fetch();

}else{
    header('Location:../404.php');    

}
require('view/profilView.php');


require('view/footer.php');

?>
